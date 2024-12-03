@extends('admin::layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>
@endsection
