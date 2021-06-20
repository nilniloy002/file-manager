<?php

namespace Modules\Media\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Entities\Media;
use Modules\Admin\Traits\HasDefaultActions;
use Modules\Media\Http\Requests\UploadMediaRequest;


class MediaController extends Controller
{
    use HasDefaultActions;
    
    protected $model = Media::class;
    
    protected $label = 'media::medias.medias';
    
    protected $viewPath = 'media::admin.media';
    
    //protected $validation = UpdateFilesRequest::class;
    
    public function index(Request $request)
    {
       
        $request->merge(clean($request->all()));
        if ($request->has('query')) {
            return Media::search($request->get('query'))
                ->query()
                ->limit($request->get('limit', 10))
                ->get();
        }

        if ($request->has('table')) {
            return (new Media)->table($request);
        }
        if(!auth()->user()->isAdmin()){
            abort(404);
        }
        $viewPath=$this->viewPath;
        
        return view("{$viewPath}.index");
    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mediaManager()
    {
        $type = request('type');
        $extension = request('extension');
        return view('media::admin.media.manager', compact('type','extension'));
    }
    
    public function store(UploadMediaRequest $request)
    {
        //$request->merge(clean($request->all()));
        $file = $request->file('file');
        
        $path = Storage::putFile('media', $file);

        $data=Media::create([
            'user_id' => auth()->id(),
            'disk' => config('filesystems.default'),
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'extension' => $file->guessClientExtension() ?? '',
            'mime' => $file->getClientMimeType(),
            'size' => $file->getClientSize(),
        ]);
        
        activity('media')
                ->performedOn($data)
                ->causedBy(auth()->user())
                ->withProperties(['subject' => $data,'causer'=>auth()->user()])
                ->log('created');
        

        return response('Created', Response::HTTP_CREATED);
    }
    
    public function destroy($ids)
    {
        $delete_id=explode(',', $ids);
        foreach($delete_id as $id)
        {
            $entity=Media::findById($id);
            activity('media')
                ->performedOn($entity)
                ->causedBy(auth()->user())
                ->withProperties(['subject' => $entity,'causer'=>auth()->user()])
                ->log('deleted');
        }
        Media::find(explode(',', $ids))->each->delete();
    }
    
}
