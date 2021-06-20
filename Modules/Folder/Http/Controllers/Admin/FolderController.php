<?php

namespace Modules\Folder\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Folder\Entities\Folder;
use Modules\Admin\Traits\HasDefaultActions;
use Modules\Folder\Http\Requests\SaveFolderRequest;
use Modules\Files\Entities\Files;

class FolderController extends Controller
{
    use HasDefaultActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Folder::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'folder::folders.folder';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'folder::admin.folders';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveFolderRequest::class;
    
    public function storeWithAssign(SaveFolderRequest $request)
    {
        $request->merge(clean($request->all()));
        
        $folder = Folder::create($request->all());
        auth()->user()->folders()->attach($folder);
        activity('folder')
            ->performedOn($folder)
            ->causedBy(auth()->user())
            ->withProperties(['subject' => $folder,'causer'=>auth()->user()])
            ->log('created');
        
        return back()->withSuccess(clean(trans('admin::messages.saved_message', ['resource' => trans('folder::folders.folder')])));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    
    public function update($id,SaveFolderRequest $request)
    {
        $request->merge(clean($request->all()));
        $folder = Folder::withoutGlobalScope('isactive')->findOrFail($id);
        $folder->update(['assign_toall'=>$request->assign_toall,'is_active'=>$request->is_active,'public_download'=>$request->public_download]);
        
        activity('folder')
            ->performedOn($folder)
            ->causedBy(auth()->user())
            ->withProperties(['subject' => $folder,'causer'=>auth()->user()])
            ->log('updated');
            
        return redirect()->route('admin.folders.index')
            ->withSuccess(trans('admin::messages.update_message', ['resource' => trans('folder::folders.folder')]));

    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Folder::withoutGlobalScope('isactive')->find($id);
    }

    /**
     * Destroy resources by given ids.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $folder=Folder::withoutGlobalScope('isactive')
            ->findOrFail($id);
           
        activity('folder')
            ->performedOn($folder)
            ->causedBy(auth()->user())
            ->withProperties(['subject' => $folder,'causer'=>auth()->user()])
            ->log('deleted');
        $folder->delete();
        return back()->withSuccess(clean(trans('admin::messages.deleted_message', ['resource' => trans('folder::folders.folder')])));
    }
    
    public function download($id,$path)
    {
        $folder=Folder::withoutGlobalScope('isactive')->findOrFail($id);
        $path=base64_decode($path);
        $folderPath= 'Files/'.$path;
        $comPath=Storage::path($folderPath);
        
        $zip_file = $folder->name.'.zip';
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        
        if(file_exists($comPath))
        {
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($comPath));
            
            foreach ($files as $name => $file)
            {
                
                // We're skipping all subfolders
                if (!$file->isDir()) {
                    
                    
                    $filePath = $file->getRealPath();
                   
                    // extracting filename with substr/strlen
                    $relativePath =$folder->name .'/'. substr($filePath, strlen($comPath) + 1);
                    
                    $SearchPath='%'.$file->getFilename()."%";
                    $SearchFiles = Files::where('path','like', $SearchPath)->first();
                    if($SearchFiles){
                        $relativePath = str_replace($file->getFilename(), $SearchFiles->filename, $relativePath);
                    }
                    
                    $zip->addFile($filePath, $relativePath);
                }else{
                    $zip->addEmptyDir($folder->name);
                }                
               
            }
           
        }else{
            $zip->addEmptyDir($folder->name);
        }
        
        $zip->close();
        
        return response()->download($zip_file)->deleteFileAfterSend(true);
        
    }
}
