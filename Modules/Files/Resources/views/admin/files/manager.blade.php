@extends('admin::fullwidth-layout')

@section('title', clean(trans('files::files.files_manager')))
@section('page-header')
    <div>
        <h2 class="text-white pb-2 fw-bold">{{ clean(trans('files::files.files_manager')) }}</h2>
        <?php /* <h5 class="text-white op-7 mb-2">{{ clean(trans('files::files.upload_new_file')) }}</h5> */?>
    </div>
@endsection
@section('content')
    @php
        $size=auth()->user()->file_size;
        if($size==''){
            $size=setting('default_file_size');
        }
    @endphp
    @hasAccess('admin.files.create')
    <div class="row">
        <div class="col-md-12">
             <div class="card m-0">
                <div class="card-body">
                @include('files::admin.files.include.upload',["size"=>$size])
                </div>
            </div>
        </div>
    </div>
    @endHasAccess
    @if (setting('enable_ad1'))
        @include('setting::admin.settings.advertisement',['ad'=>setting('ad_block_1')])
    @endif
    @hasAccess('admin.files.index')
    <div class="row">
        <div class="col-md-12">
            <div class="card m-0 ">
                <div class="card-body" id="files-table">
                    <div class="table-responsive">

                            <table class="display table table-striped table-hover" >
                                <thead>
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
                                </thead>

                                <tbody></tbody>
                            </table>

                            @push('more-actions')
                                @include('files::admin.files.include.more-actions')
                            @endpush
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endHasAccess
    @if (setting('enable_ad2'))
        @include('setting::admin.settings.advertisement',['ad'=>setting('ad_block_2')])
    @endif
@endsection


@push('general')
    <script>
    (function () {
        "use strict";
        CI.maxFileSize = "{{ $size }}"
        CI.AllowExtensions = ".{{ $fileExtension->implode(', .') }}"
        CI.langs['files::files.success_message'] = '{{ clean(trans('files::files.success_message')) }}';
        @if(!auth()->user()->isAdmin() && !setting('delete_assign_folder_files'))
            CI.langs['admin::admin.delete.confirmation_message'] = '{{ clean(trans('admin::admin.delete.confirmation_message')) }}'+'\n{{ clean(trans('files::files.delete_note_for_user')) }}';
        @endif
    })();
    </script>
@endpush
@push('scripts')
<script>

    (function () {
        "use strict";
        DataTable.setRoutes('#files-table .table', {
            index: '{{ "admin.files.index" }}',

            @hasAccess("admin.files.edit")

                edit: '{{ "admin.files.edit" }}',

            @endHasAccess
            @hasAccess("admin.files.destroy")
                destroy: '{{ "admin.files.destroy" }}',
            @endHasAccess
        });

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
