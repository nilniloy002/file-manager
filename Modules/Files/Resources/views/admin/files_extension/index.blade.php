@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('files::files.files_extension')))
    
    <li class="nav-item"><a href="{{ route('admin.files.index') }}">{{ clean(trans('files::files.files')) }}</a></li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">{{ clean(trans('files::files.files_extension')) }}</li>
@endcomponent

@section('content')
    
    <div class="row">
        @hasAccess('admin.files-extension.create')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ clean(trans('files::files.add_files_extension')) }}</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.files-extension.store') }}" class="form-horizontal" id="files-extension-create-form">
                {{ csrf_field() }}
                    <div class="card-body">
                        {{ Form::text('name', clean(trans('files::files.table.name')), $errors, '', ['required' => true]) }}
                        {{ Form::checkbox('assign_toall', clean(trans('files::files.form.assign_toall')), clean(trans('files::files.form.assign_toall_message_for_extension')), $errors,['assign_toall'=>1]) }}
                        
                    </div>
                    <div class="card-action text-right">
                        <button type="submit" class="btn btn-primary" data-loading>
                        {{ clean(trans('admin::admin.buttons.save')) }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endHasAccess
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">{{ clean(trans('files::files.files_extension')) }}</h4>
                        
                    </div>
                </div>
                <div class="card-body" id="files-extension-table">
                    <div class="table-responsive">
                        <table class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    @include('admin::include.table.select-all',["name"=>clean(trans('files::files.files_extension'))])

                                    <th>{{ clean(trans('files::files.table.name')) }}</th>
                                    <th>{{ clean(trans('files::files.table.assign_toall')) }}</th>
                                    <th data-sort>{{ clean(trans('admin::admin.table.created')) }}</th>
                                </tr>
                            </thead>
                        </table>
                       
                    </div>
                </div>
            </div>
        
        </div>
    </div>
@endsection

@push('scripts')
    <script>
    (function () {
        "use strict";
        DataTable.setRoutes('#files-extension-table .table', {
            index: '{{ "admin.files-extension.index" }}',
            @hasAccess("admin.files-extension.destroy")
                destroy: '{{ "admin.files-extension.destroy" }}',
            @endHasAccess
        });
        new DataTable('#files-extension-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'name', name: 'name' },
                { data: 'assign_toall', name: 'assign_toall' },
                { data: 'created', name: 'created_at' },
            ],
        });
    })();  
    </script>
@endpush
