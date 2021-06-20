<div class="file-action">
@if(setting('enable_file_download'))
<a href="{{ route('admin.files.download',$download_key) }}"><i class="fas fa-download"></i></a>
@endif
@if(setting('enable_file_preview'))
    @if($file->extension=='pdf') 
        <a href="{{ $file->path }}" data-fancybox="gallery" data-caption="{{ $file->filename }}" data-type="iframe"  ><i class="fas fa-eye"></i></a>
    @elseif($file->isImage()) 
        <a href="{{ $file->path }}" class="fancybox" data-fancybox="gallery" data-caption="{{ $file->filename }}" ><i class="fas fa-eye"></i></a>
    @elseif($file->isVideo()) 
        <a data-fancybox="gallery" href="{{ $file->path }}" data-caption="{{ $file->filename }}"   data-width="640" data-height="360" ><i class="fas fa-eye"></i></a>
    @else
        <a href="{{ route('admin.files.download',$download_key) }}"><i class="fas fa-eye"></i></a>
    @endif
@endif
@if($file->description!='')
    <a href="#" title="{{ clean(trans('files::files.form.description')) }}" data-toggle="modal" data-target="#desc-{{ $file->id }}"><i class="fas fa-info-circle"></i></a>
    
    <div class="modal fade" id="desc-{{ $file->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ clean(trans('files::files.form.description')) }} | {{ $file->filename }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   {{ $file->description }}
                </div>
                
            </div>
        </div>
    </div>  
    
@endif 
@hasAccess('admin.files.destroy')
    @if(auth()->user()->isAdmin())
        <a href="#" class="btn-fileDelete" data-id="{{ $file->id }}" ><i class="far fa-times-circle"></i></a>
    @else
        @if(auth()->user()->id==$file->user_id || setting('delete_assign_folder_files'))
            <a href="#" class="btn-fileDelete" data-id="{{ $file->id }}" ><i class="far fa-times-circle"></i></a>
        @endif       
    @endif      
@endHasAccess 
</div>     





