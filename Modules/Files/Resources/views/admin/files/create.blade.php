@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('files::files.files')))

    <li class="nav-item"><a href="{{ route('admin.files.index') }}">{{ clean(trans('files::files.files')) }}</a></li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">{{ clean(trans('files::files.upload')) }}</li>
@endcomponent

@section('content')
    <div class="row">
        <div class="col-md-12">
             <div class="card">
                <div class="card-body">    
                @php
                    $size=auth()->user()->file_size;
                    if($size==''){
                        $size=setting('default_file_size'); 
                    }
                @endphp
                @include('files::admin.files.include.upload',["size"=>$size])
                @push('more-actions')
                    @include('files::admin.files.include.more-actions')
                @endpush                
                </div>
            </div>
        </div>
    </div>
@endsection

@push('general')
    <script>
    (function () {
        "use strict";
        CI.maxFileSize = "{{ $size }}"
        CI.AllowExtensions = ".{{ $fileExtension->implode(', .') }}"
        CI.langs['files::files.success_message'] = '{{ clean(trans('files::files.success_message')) }}';
    })();  
    </script>
@endpush
