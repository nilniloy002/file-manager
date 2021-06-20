@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('media::medias.medias')))

    <li class="nav-item">{{ clean(trans('media::medias.medias')) }}</li>
@endcomponent
@section('content')
    @include('media::admin.media.include.uploader')
    @include('media::admin.media.include.table')
@endsection

@push('scripts')
<script>
    
    (function () {
        "use strict";
        DataTable.setRoutes('#media-table .table', {
            index: '{{ "admin.media.index" }}',
            
            @hasAccess("admin.media.edit")
                
                edit: '{{ "admin.media.edit" }}',
                
            @endHasAccess
            @hasAccess("admin.media.destroy") 
                destroy: '{{ "admin.media.destroy" }}',
            @endHasAccess
        });
        new DataTable('#media-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                { data: 'filename', name: 'filename' },
                @if(auth()->user()->isAdmin())
                { data: 'uploader', name: 'uploader.first_name' },
                @endif
                { data: 'size', name: 'size', orderable: false,searchable: false,},
                { data: 'extension', name: 'extension' },
                { data: 'created', name: 'created_at' },
                { data: 'action', name: 'action',orderable: false, searchable: false,className:"noclickable" },
            ],
        });
        
    })();   
    
</script>
@endpush
