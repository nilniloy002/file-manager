@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('folder::folders.folders')))

    <li class="nav-item">{{ clean(trans('folder::folders.folders')) }}</li>
@endcomponent

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <a href="#" class="collapse-all">{{ clean(trans('folder::folders.tree.collapse_all')) }}</a> |
                <a href="#" class="expand-all">{{ clean(trans('folder::folders.tree.expand_all')) }}</a>
                
            </div>
            <div class="card-body" id="menus-table">
                
                <div class="root-tree"><h5>{{ clean(trans('folder::folders.tree.root')) }}</h5></div>
                <div class="folder-tree"></div>
            </div>
        </div>
    
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header clearfix">
                <div class="pull-right">
                    <button class="btn btn-primary  ml-auto add-root-folder">{{ clean(trans('folder::folders.tree.add_root_folder')) }}</button>
                    <button class="btn btn-primary ml-auto add-sub-folder disabled">{{ clean(trans('folder::folders.tree.add_sub_folder')) }}</button>
                
                </div>
            </div>
            <form method="POST" action="{{ route('admin.folders.store') }}" class="form-horizontal" id="folder-form" novalidate>
            {{ csrf_field() }}
                <div class="card-body">
                    {{ Form::text('name', clean(trans('folder::attributes.name')), $errors, null, ['required' => true]) }}
                    <div id="slug-field" class="d-none">
                    {{ Form::text('slug', clean(trans('folder::attributes.slug')), $errors) }}
                    </div>
                    {{ Form::checkbox('assign_toall', clean(trans('folder::attributes.assign_toall')), clean(trans('folder::folders.form.show_this_folder_to_all')), $errors) }}
                    {{ Form::checkbox('is_active', clean(trans('folder::attributes.is_active')), clean(trans('folder::folders.form.enable_the_folder')), $errors) }}
                    {{ Form::checkbox('public_download', clean(trans('folder::attributes.public_download')), clean(trans('folder::folders.form.enable_download_files_without_login_inside_this_folder')), $errors) }}
                    
                </div>
                <div class="card-footer">
                    <div class="form-group clearfix">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary" data-loading>
                                {{ clean(trans('admin::admin.buttons.save')) }}
                            </button>

                            <button type="button" class="btn btn-danger btn-delete-folder d-none" data-loading>
                                {{ clean(trans('admin::admin.buttons.delete')) }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <form method="POST" id="folders-delete-form" action="">
                {{ csrf_field() }}
                {{ method_field('delete') }}
            
            </form>
        </div>
    </div>
</div>
@endsection
