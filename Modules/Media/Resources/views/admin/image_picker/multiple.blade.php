<div class="form-group row ">
    <label for="about" class="col-md-4 text-left">
        <h4>{{ $title }}</h4>
    </label>
    <div class="multiple-images-wrapper col-md-8 p-0">
        
        <div class="multiple-images pull-left">
            <div class="col-md-12">
                <div class="row">
                    <div class="image-list image-holder-wrapper clearfix">
                        @if ($medias->isEmpty())
                            <div class="image-holder placeholder cursor-auto">
                                <i class="fas fa-camera-retro"></i>
                            </div>
                        @else
                            @foreach ($medias as $media)
                                <div class="image-holder">
                                    <img src="{{ $media->path }}">
                                    <button type="button" class="btn remove-image"></button>
                                    <input type="hidden" name="{{ $inputName }}" value="{{ $media->id }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <button type="button" class="image-picker btn btn-default btn-border pull-left clearfix" data-input-name="{{ $inputName }}" data-multiple>
            <i class="fas fa-folder-open mr-2"></i> {{ clean(trans('media::medias.browse')) }}
        </button>

        
    </div>
</div>
