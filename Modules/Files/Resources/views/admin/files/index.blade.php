@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('files::files.files')))

    <li class="nav-item">{{ clean(trans('files::files.files')) }}</li>
@endcomponent

@component('admin::include.page.table')
    @slot('title', clean(trans('files::files.files_management')))
    @slot('resource', 'files')
    @slot('name', clean(trans('files::files.files')))

    @slot('thead')
        <tr>
            @include('admin::include.table.select-all',["name"=>clean(trans('files::files.files'))])

            <th>{{ clean(trans('files::files.table.file')) }}</th>
            <th>{{ clean(trans('files::files.table.name')) }}</th>
            <th>{{ clean(trans('files::files.table.size')) }}</th>
            <th>{{ clean(trans('files::files.table.folder')) }}</th>
            <th>{{ clean(trans('files::files.table.user')) }}</th>
            <th data-sort>{{ clean(trans('admin::admin.table.created')) }}</th>
            <th>{{ clean(trans('files::files.table.action')) }}</th>
        </tr>
    @endslot
    @push('more-actions')
        @include('files::admin.files.include.more-actions')
    @endpush
@endcomponent

@push('scripts')
    <script>
    (function () {
        "use strict";

        @if(!auth()->user()->isAdmin() && !setting('delete_assign_folder_files'))
            CI.langs['admin::admin.delete.confirmation_message'] = '{{ clean(trans('admin::admin.delete.confirmation_message')) }}'+'\n{{ clean(trans('files::files.delete_note_for_user')) }}';
        @endif

        @if(setting('enable_file_download') || setting('enable_file_move') || setting('enable_file_share'))
            var btnShare='';
            var btnDownloadZip='';
            var btnMoveFiles='';
            @if(setting('enable_file_download'))
                var btnDownloadZip='<a class="dropdown-item btn-moreaction" href="#" id="btnDownloadZip"><i class="fas fa-download"></i> {{ clean(trans("files::files.action.download_zip")) }}</a>';
            @endif
            @if(setting('enable_file_move'))
                var btnMoveFiles='<a class="dropdown-item btn-moreaction" href="#" id="btnMove"><i class="fas fa-cut"></i> {{ clean(trans("files::files.action.move_files")) }}</a>';
            @endif

            var btnHTML='<div class="dropdown d-inline-block"><button class="btn btn-primary dropdown-toggle" type="button" id="btn-moreAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled="disabled">{{ clean(trans("files::files.table.action")) }}</button><div class="dropdown-menu" aria-labelledby="btn-moreAction">'+btnShare+btnMoveFiles+btnDownloadZip+'</div></div>';

            DataTable.customBtn(btnHTML);
        @endif

        new DataTable('#files-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                { data: 'filename', name: 'filename' },
                { data: 'size', name: 'size', orderable: false,searchable: false,},
                { data: 'folder_name', name: 'path' },
                { data: 'uploader', name: 'uploader.first_name' },
                { data: 'created', name: 'created_at' },
                { data: 'action', name: 'action',orderable: false, searchable: false,className:"noclickable" },
            ],
        });
    })();
    </script>
@endpush

