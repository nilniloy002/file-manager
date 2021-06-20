<div class="form-group row ">
    <label for="about" class="col-md-4 text-left">
        {{ $title }}
    </label>
    <div class="single-image-wrapper col-md-8 p-0">
        
        
        <div class="single-image image-holder-wrapper  pull-left  ">
            @if (! $media->exists)
                <div class="image-holder placeholder">
                    <i class="fas fa-camera-retro"></i>
                </div>
            @else
                <div class="image-holder">
                    <img src="{{ $media->path }}">
                    <button type="button" class="btn remove-image" data-input-name="{{ $inputName }}"></button>
                    <input type="hidden" name="{{ $inputName }}" value="{{ $media->id }}">
                </div>
            @endif
        </div>
        <button type="button" class="image-picker btn btn-default btn-border pull-left clearfix" data-input-name="{{ $inputName }}">
            <i class="fas fa-folder-open mr-2"></i> {{ clean(trans('media::medias.browse')) }}
        </button>
        <div class="clearfix"></div>
        <span class="help">
        {{ $help ?? '' }}
    </span>
    </div>
    
</div>