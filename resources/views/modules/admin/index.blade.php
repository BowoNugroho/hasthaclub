@extends('admin::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('admin.name') !!}
    </p>
    
    @auth
    <p>User: {{ Str::ucfirst(auth()->user()->name) }} || {{ Str::ucfirst(auth()->user()->getRoleNames()->implode(' ')) }}</p>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger" onclick="confirmLogout()">Logout</button>
    </form>
@endauth
@endsection

<script>
function confirmLogout() {
    if (!confirm('Are you sure you want to logout?')) {
        event.preventDefault();
    }
}
</script>
