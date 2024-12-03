@extends('shop::layouts.app')

@section('content')
<p>masuk</p>
<form action="{{ route('logoutCs') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger" onclick="confirmLogout()">Logout</button>
</form>
@endsection