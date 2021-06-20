@extends('admin::layout')

@section('title', clean(trans('admin::dashboard.dashboard')))

@section('page-header')
    <h4 class="page-title">Welcome to Walton Filemanager</h4>
@endsection


@section('content')
    @hasAccess('admin.files.index')
        @include('admin::dashboard.include.files')
    @endHasAccess
@endsection
