<div class="file-action">

@if(request()->type || request()->extension)
    <button type="button" class="btn btn-icon btn-default btn-border btn-xs select-media "
        data-id="{{ $media->id }}"
        data-path="{{ $media->path }}"
        data-filename="{{ $media->filename }}"
        data-type="{{ strtok($media->mime, '/') }}"
        data-icon="{{ $media->icon() }}"
        data-toggle="tooltip"
        data-placement="bottom"
        title="{{ clean(trans('media::medias.select_this_media')) }}"
    >
       <i class="fas fa-file-medical"></i>
    </button>
@else
    @if($media->extension=='pdf') 
        <a class="btn btn-icon btn-default btn-border btn-xs" href="{{ $media->path }}" data-fancybox="gallery" data-caption="{{ $media->filename }}" data-type="iframe"  ><i class="fas fa-eye"></i></a>
    @elseif($media->isImage()) 
        <a class="btn btn-icon btn-default btn-border btn-xs" href="{{ $media->path }}" class="fancybox" data-fancybox="gallery" data-caption="{{ $media->xs }}" ><i class="fas fa-eye"></i></a>
    @elseif($media->isVideo()) 
        <a class="btn btn-icon btn-default btn-border btn-xs" data-fancybox="gallery" href="{{ $media->path }}" data-caption="{{ $media->filename }}"   data-width="640" data-height="360" ><i class="fas fa-eye"></i></a>
    @else
        
    @endif
@endif
</div>