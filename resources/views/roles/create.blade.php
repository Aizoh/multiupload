@extends('layouts.app')
@section('content')
<div class="container">
       
    <div class="panel panel-primary">
  
      <div class="panel-heading">
        <h2>Create Role</h2>
      </div>
  
      <div class="panel-body">
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
         @endif
    
      <!-- Create roles here -->
      <form action="{{ route('roles.store') }}" method="post">
        @csrf
        <label for="name">Role Name:</label>
        <input type="text" name="name" required>
        <label for="name">Role Title:</label>
        <input type="text" name="title" required>
        <button type="submit">Create Role</button>
    </form>

      </div>
    </div>
</div>
@endsection