@extends('admin::layouts.master')

@section('title')
    Dashboard - {{ config('app.name', 'Laravel') }}
@endsection

@section('content')
    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>
@endsection
