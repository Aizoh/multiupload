@extends('layouts.app')
@section('content')
<div class="container">
       
    <div class="panel panel-primary">
  
      <div class="panel-heading">
        <h2>My files</h2>
      </div>
  
      <div class="panel-body">
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
      
          <div>
            {{$response->body()}}
          </div> 
          

      </div>
    </div>
</div>
@endsection             