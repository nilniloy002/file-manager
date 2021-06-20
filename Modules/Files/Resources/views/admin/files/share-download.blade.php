@extends('admin::fullwidth-layout')

@section('title', clean(trans('files::files.share.available_file_for_download')))
@section('page-header')
    <div>
        <h2 class="text-white pb-2 fw-bold">{{ clean(trans('files::files.share.available_file_for_download')) }}</h2>
    </div>
    <div class="ml-md-auto py-2 py-md-0">
        @if($filesShare->pwd=='' &&  $unlock)
        <form method="POST" action="{{ route('admin.files.downloadZip') }}" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="filesid" value="{{$filesids}}">
            <button type="submit" class="btn btn-secondary btn-round"><i class="fas fa-download"></i> {{ clean(trans('files::files.action.download_zip')) }}</button>
        </form>
        @endif
    </div>
@endsection
@section('content')
<div class="row">
    
    <div class="col-md-12">
        
        @if(!$expired)
            <div class="card m-0 ">
                <div class="card-body">
                    @if (setting('enable_ad2'))
                        @include('setting::admin.settings.advertisement',['ad'=>setting('ad_block_2')])
                    @endif 
                    <div class="row">
                        
                    @if($filesShare->pwd=='' &&  $unlock)
                        @foreach($files as $file)
                           <div class="col-sm-6 col-lg-6">
                                <div class="card p-3 ci-download-box">
                                    <div class="d-flex align-items-center">
                                        <span class="stamp stamp-md bg-info mr-3">
                                            <i class="{{ $file->icon() }}" style="font-size: 20px;"></i>
                                        </span>
                                        <div>
                                            @php
                                                $download_key=id_encode($file->id);
                                                $size=display_filesize($file->size);
                                            @endphp
                                            <h5 class="mb-1"><b><a href="{{ route('admin.files.download',$download_key) }}"><i class="fas fa-cloud-download-alt text-primary"></i> {{ $file->filename }} </a> </b></h5>
                                            <small class="text-muted">{{ $size }}</small>
                                            
                                            @if($file->description!='')
                                                
                                                | <a href="#" title="{{ clean(trans('files::files.form.description')) }}" data-toggle="modal" data-target="#desc-{{ $file->id }}">View Description</a>
                                                
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
                                            @if(!$file->folder->public_download && !auth()->user())
                                                
                                                | <span class="text-danger">{{ clean(trans('files::files.share.require_login_to_download')) }}</span> 
                                            
                                            @endif
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                       
                        <div class="col-md-6 ml-auto mr-auto">
                            <form method="POST" action="{{ route('admin.files.unlock',$filesShare->share_id) }}">
                            {{ csrf_field() }}
                                <div class="form-group form-floating-label {{ $errors->has('unlockpassword') ? 'has-error' : '' }}">
                                        <input type="password" class="form-control input-border-bottom" id="unlockpassword" name="unlockpassword" required="">
                                        <label for="unlockpassword" class="placeholder">{{  clean(trans('files::files.share.password')) }} </label>
                                        <small id="emailHelp2" class="form-text text-muted">{{ clean(trans('files::files.share.password_help')) }}</small>
                                        @if($errors->has('unlockpassword'))
                                            <span class="help-block">{{ clean($errors->first('unlockpassword')) }}</span>
                                        @endif
                                </div>
                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" ><i class="fa fa-check"></i></button>
                                </div>
                            </form>
                        </div>
                        
                    @endif        
                    </div>
                    
                </div>
            </div>
        @else
            
                <div class="alert alert-danger" role="alert"> {{ clean(trans('files::files.share.link_has_expired')) }}</div>
                
            
        @endif   
            
    </div>
</div>
@if (setting('enable_ad2'))
        @include('setting::admin.settings.advertisement',['ad'=>setting('ad_block_2')])
@endif 

@endsection

