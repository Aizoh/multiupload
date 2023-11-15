@extends('layouts.app')
@section('content')
<div class="container">
       
    <div class="panel panel-primary">
  
      <div class="panel-heading">
        <h2>files</h2>
      </div>
  
      <div class="panel-body">
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
      
        <div class="table-responsive">
            <table class="table">
              <thead>
                <td>Name</td>
                <td>Created</td>
                <td>Description</td>
              </thead>
             
              <tr>
                <td>{{$file->name}}</td>
                <td>{{$file->created_at}}</td>
                <td>{!! $file->description !!}</td>
              </tr>
            
            </table>
          </div>

       
            
        
      </div>
    </div>
</div>
@endsection            