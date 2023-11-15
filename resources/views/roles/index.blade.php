@extends('layouts.app')
@section('content')
<div class="container">
       
    <div class="panel panel-primary">
  
      <div class="panel-heading">
        <h2>Roles</h2>
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
         <a class="navbar-brand" href="{{ url('/roles/create') }}">
            Create Role 
        </a>
      <!-- List all roles here -->
            @foreach($roles as $role)
                <p>{{ $role->name }}</p>
            @endforeach
        <!--tabke beginds -->
        
      </div>
    </div>
    <table>
          <thead>
            <tr class="row">
              <th class="col-md-4">Model</th>
              <th  class="col-md-2">Create</th>
              <th  class="col-md-2">View</th>
              <th class="col-md-2">Edit</th>
              <th class="col-md-2">Delete</th>
            </tr>
          </thead>
          @foreach ($models as $model )
          <tr class="row">
            <td class="col-md-4">{{$model->friendly}}</td>
            <td class="col-md-2"><input type="checkbox" id="create"> </td>
            <td class="col-md-2"><input type="checkbox" id="view"> </td>
            <td class="col-md-2"><input type="checkbox" id="edit"> </td>
            <td class="col-md-2"><input type="checkbox" id="delete"> </td>
          </tr>
          @endforeach
          
          <!-- Add your table body rows here -->
        
        </table>
</div>
@endsection