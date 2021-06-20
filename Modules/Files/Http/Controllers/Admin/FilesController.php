<?php

namespace Modules\Files\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Modules\Files\Entities\Files;
use Modules\Files\Entities\FilesShare;
use Modules\Folder\Entities\Folder;
use Modules\Files\Entities\FileExtension;
use Modules\Files\Emails\ShareLinks;
use Modules\Admin\Traits\HasDefaultActions;
use Modules\Files\Http\Requests\UploadFilesRequest;
use Modules\Files\Http\Requests\UpdateFilesRequest;
use Carbon\Carbon;
use TypiCMS\NestableTrait;

class FilesController extends Controller
{
    use HasDefaultActions;
    
    protected $model = Files::class;
    
    protected $label = 'files::files.files';
    
    protected $viewPath = 'files::admin.files';
    
    //protected $validation = UpdateFilesRequest::class;
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filesManager()
    {
        $fileExtension=FileExtension::getUsersExtension();
        return view("files::admin.files.manager", ['fileExtension'=>$fileExtension]);
    }
    
    public function create()
    {
        $fileExtension=FileExtension::getUsersExtension();
        return view("files::admin.files.create", ['fileExtension'=>$fileExtension]);
    }
    
    public function store(UploadFilesRequest $request)
    {
        $request->merge(clean($request->all()));
        $file = $request->file('file');
        $folder='Files';
        $folderId=0;
        if($request->has('ufto'))
        {
            $folderId=$request->ufto;
            
        }
        if($request->has('uftop'))
        {
            $path=base64_decode($request->uftop);
            $folder.='/'.$path;
            
            
        }
        //dd($folder);
        $path = Storage::putFile( $folder, $file);

        $data=Files::create([
            'user_id' => auth()->id(),
            'folder_id' => $folderId,
            'disk' => config('filesystems.default'),
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'extension' => $file->guessClientExtension() ?? '',
            'mime' => $file->getClientMimeType(),
            'size' => $file->getClientSize(),
        ]);
        
        activity('file')
                ->performedOn($data)
                ->causedBy(auth()->user())
                ->withProperties(['subject' => $data,'causer'=>auth()->user()])
                ->log('created');
        

        return response('Created', Response::HTTP_CREATED);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateFilesRequest $request)
    {
        $request->merge(clean($request->all()));
        

        $file = Files::findOrFail($id);
        
        //dd($request->filename);
        $filename=str_replace('.', '-', $request->filename);
        $filename=$filename.'.'.$file->extension;
        $file->update(['filename'=>$filename,'description'=>$request->description]);
        
        activity('file')
                ->performedOn($file)
                ->causedBy(auth()->user())
                ->withProperties(['subject' => $file,'causer'=>auth()->user()])
                ->log('updated');
        
        return redirect()->route('admin.files.index')
            ->withSuccess(trans('admin::messages.update_message', ['resource' => trans('files::files.files')]));
    }
    
    public function destroy($ids)
    {
        
        $delete_id=explode(',', $ids);
        $dID=[];
        $flag=1;
        if(!auth()->user()->isAdmin() && !setting('delete_assign_folder_files'))
        {
            $flag=0;    
        }
        
        foreach($delete_id as $id)
        {
            $entity=Files::findById($id);
            if($flag==0 && auth()->user()->id==$entity->user_id){$flag=1;}
            if($flag){
                $dID[]=$entity->id;
                activity('file')
                    ->performedOn($entity)
                    ->causedBy(auth()->user())
                    ->withProperties(['subject' => $entity,'causer'=>auth()->user()])
                    ->log('deleted');
            }
        }
        Files::find($dID)->each->delete();
    }
    
    public function download($id)
    {
        $id=id_decode($id);
        $files = Files::with('folder')->where('id', $id)->firstOrFail();
        
        if($files && $files->folder()->exists())
        {
            if(!$files->folder->public_download && !auth()->user())
            {
                return redirect()->route('admin.login');
            }
            $files->increment('download');
            
            activity('file')
                ->performedOn($files)
                ->causedBy(auth()->user())
                ->withProperties(['subject' => $files,'causer'=>auth()->user()])
                ->log('download');
            
            $headers = [
              'Content-Type' => $files->mime,
            ];
            $path=$files->path;
            $temp = tempnam(sys_get_temp_dir(), $files->filename);
            copy($path, $temp);
            return response()->download($temp, $files->filename, $headers);
            
        }else{
            return back();
        }
        
    }
    
    public function fileshare($id)
    {
        $filesShare = FilesShare::findByShareId($id);
        
        if($filesShare)
        {
            
            $unlock=1;
            if($filesShare->pwd!='')
            {
                $unlock=0;
            }
           
            if(request()->session()->get('unlock'))
            {
                $passw=Crypt::decryptString(request()->session()->get('unlock'));
                if($filesShare->pwd==$passw)
                {
                    $unlock=1;
                    $filesShare->pwd='';
                }
              
            }
            
            
            $fileid=$filesShare->files;
            $fileids=implode(',',$fileid);
            $files=Files::findByIds($fileid);
            
            return view("files::admin.files.share-download", ['filesShare'=>$filesShare,'files'=>$files,'expired'=>false,'unlock'=>$unlock,'filesids'=>$fileids]);
        }
        return view("files::admin.files.share-download", ['expired'=>true,'filesids'=>'']);
        
    }
    
    public function generatelink(Request $request)
    {
        $request->merge(clean($request->all()));
        $fileid=$request->fileid;
        $pass=$request->pass;
        if(empty($fileid)){
            return response()->json(['success' => false,'msg'=>"Something went to wrong. Please Try again later..."]);
        }
        
        $current_timestamp = Carbon::now()->timestamp;
        $share_id=id_encode(auth()->id().'-'.$current_timestamp);
        FilesShare::create([
            'share_id' => $share_id,
            'user_id' => auth()->id(),
            'pwd' =>$pass,
            'files' => $fileid,
        ]);
        $url = route('admin.files.fileshare',$share_id);
        return response()->json(['success' => true,'link'=>$url,'msg'=>""]);
    }
    
     public function unlock($id) {
         
        $filesShare = FilesShare::findByShareId($id);
        if($filesShare)
        {
            if(request()->has('unlockpassword'))
            {
                $request=clean(request()->all());
                if($filesShare->pwd==$request['unlockpassword'])
                {
                    request()->session()->put('unlock',Crypt::encryptString($request['unlockpassword']));
                    return redirect()->route('admin.files.fileshare',$filesShare->share_id);
                    
                }else{
                    return redirect()->route('admin.files.fileshare',$filesShare->share_id)->withErrors(['unlockpassword'=>trans('files::files.share.password_error')]);
                }
              
            }
        }
        return redirect()->route('admin.files.fileshare',$filesShare->share_id)->withErrors(['unlockpassword'=>clean(trans('files::files.share.password_error'))]);
    }
    public function sendemail(Request $request)
    {
        $request->merge(clean($request->all()));
        $fromEmail=$request->fromEmail;
        $toEmail=$request->toEmail;
        $msgText=$request->message;
        $url=$request->url;
        if(empty($fromEmail) || empty($toEmail) || empty($url) ){
            return response()->json(['success' => false,'msg'=>"Something went to wrong. Please Try again later..."]);
        }
        
        try{
            Mail::to($toEmail)
                ->send(new ShareLinks($fromEmail,$toEmail,$msgText,$url));
        }catch(\Exception $e)
        {
            return response()->json(['success' => false,'msg'=>clean(trans('base::messages.mail_is_not_configured'))]);
        }
       
        return response()->json(['success' => true,'msg'=>"Message sent to: ".$toEmail]);
    }
    
    public function movefiles(Request $request)
    {
        $request->merge(clean($request->all()));
        $movefolderid=$request->folder;
        $filesid=$request->filesid;
        
        if(empty($filesid) || $movefolderid=='' ){
            return back()->withError(clean(trans('admin::messages.common_error_message')));
        }
        $movefolderPath='Files';
        if($request->has('mfp'))
        {
            $path=base64_decode($request->mfp);
            $movefolderPath.='/'.$path;
        }
        
        $movefolder=Folder::findOrFail($movefolderid);
        $filesid=explode(',',$filesid);
        $files=Files::whereIn('id',$filesid)->get();
        foreach($files as $file){
            $filepath=$file->getOriginal('path');
            $basename = basename($filepath);
            $oldPath=$filepath;
            $newPath=$movefolderPath.'/'.$basename;
            if($oldPath!=$newPath){
                Storage::move($oldPath,  $newPath);
                $file->path=$movefolderPath.'/'.$basename;
                $file->folder_id=$movefolderid;
                $file->save(); 
            }
        }
        
        return back()->withSuccess(clean(trans('files::files.move.move_file_success_message')));
        
    }
    
    public function downloadZip(Request $request)
    {
        $request->merge(clean($request->all()));
        
        $filesid=$request->filesid;
        if($filesid==''){
            return back()->withError(clean(trans('admin::messages.common_error_message')));
        }
        $filesid=explode(',',$filesid);
        $files=Files::with('folder')->whereIn('id',$filesid)->get();
        if(!$files->count()){
            return back()->withError(clean(trans('admin::messages.common_error_message')));
        }
        $zip_file = 'downloads.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        $count=1;
        foreach($files as $file){
            if(!$file->folder->public_download && !auth()->user())
            {
                continue; 
            }
            $count=0;
            $file->increment('download');
            $filepath=$file->getOriginal('path');
            $comPath=Storage::path($filepath);
            $zip->addFile($comPath,$file->filename);
        }
        if($count){$zip->addEmptyDir('.');}
        $zip->close();
        
        return response()->download($zip_file)->deleteFileAfterSend(true);
        
    }
    
}
