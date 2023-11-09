@extends('layouts.app')
@section('content')
@php use Silber\Bouncer\Bouncer; @endphp
<div class="container">
    <!--success-->
    @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
    @endif
    <!-- Display errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <a class="navbar-brand" href="{{ url('/roles') }}">
        View Available Roles
    </a>
    <!-- user/index.blade.php -->
@foreach($users as $user)
<h2>{{ $user->name }}</h2>

<form action="{{ route('assign-roles', $user->id) }}" method="post">
    @csrf
    @method('PUT')

    @foreach($roles as $role)
        <label>
            <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->isA($role->name) ? 'checked' : '' }}>
            {{ $role->name }}
        </label>
        <br>
    @endforeach

    <button type="submit">Assign Roles</button>
</form>

<hr>
@endforeach

    
</div>
    
@endsection