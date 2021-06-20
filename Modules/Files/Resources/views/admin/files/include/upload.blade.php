<div class="row">
    
    <div class="col-md-4">
        <h4 for="select_folder">{{ clean(trans('files::files.form.select_folder')) }}
            @hasAccess('admin.folders.create')
            <a href="#" class="btn btn-primary btn-sm" id="btnNewFolder" data-toggle="tooltip" title="{{clean(trans('files::files.action.new_folder'))}}">
                <i class="fas fa-plus"></i> {{ clean(trans('files::files.action.new_folder'))}}
            </a>
            @endHasAccess
        </h4> 
        <div class="file-folder-tree"></div>
    </div>
    <div class="col-md-8">
        
        <ul class="breadcrumbs upload-breadcrumbs pull-left">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <span id="update">
            </span>
            
        </ul>
        @if(setting('enable_file_download'))
        <ul class="upload-breadcrumbs pull-right">
            <li class="nav-home"  data-toggle="tooltip" title="{{clean(trans('files::files.download_folder'))}}">
                <a href="#" id="downloadFolder">
                    <i class="fas fa-download"></i>
                </a>
            </li>
            
            
        </ul>
        @endif
        <div class="clearfix"></div>
        
        <form method="POST" class="dropzone dz-clickable">
            {{ csrf_field() }}
            <input type="hidden" id="ufto" name="ufto" value="0" >
            <input type="hidden" id="uftop" name="uftop" value="" >
            <div class="dz-message" data-dz-message>
                <div class="icon">
                    <i class="flaticon-file"></i>
                </div>
                <h4 class="message">{{ clean(trans('files::files.drop_drop_here')) }}</h4>
                
            </div>
            
            
        </form>
        <div>
            
            <span class="pull-left"> <strong>{{ clean(trans('files::files.allow_extensions')) }}:</strong> .{{ $fileExtension->implode(', .') }}</span>
            <span class="pull-right"><strong>{{ clean(trans('files::files.max_file_size')) }}:</strong> {{$size }} MB</span>
        </div>

    </div>
    
</div>

                    
               