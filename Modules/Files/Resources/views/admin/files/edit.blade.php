@extends('admin::layout')

@component('admin::include.page.header')
    @slot('title', clean(trans('admin::resource.edit', ['resource' => trans('files::files.files')])))
    @slot('subtitle', $files->filename)
    <li class="nav-item"><a href="{{ route('admin.files.index') }}">{{ clean(trans('files::files.files')) }}</a></li>
    <li class="separator"><i class="flaticon-right-arrow"></i></li>
    <li class="nav-item">{{ clean(trans('admin::resource.edit', ['resource' => trans('files::files.files')])) }}</li>
@endcomponent

@section('content')
<div class="row">
    <div class="col-md-12">
         <form method="POST" action="{{ route('admin.files.update', $files) }}" class="form-horizontal" id="user-edit-form" novalidate>
            {{ csrf_field() }}
            {{ method_field('put') }}

            {!! $tabs->render(compact('files')) !!}
        </form> 
    </div>
</div>
@endsection