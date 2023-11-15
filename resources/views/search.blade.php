@extends('layouts.app')
@section('content')
<div class="container">
       
    <div class="panel panel-primary">
  
      <div class="panel-heading">
        <h2>Users</h2>
      </div>
  
      <div class="panel-body">
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
      
        @if(session('error'))
            <div class="error alert alert-danger alert-block">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('files.json') }}" method="POST" enctype="multipart/form-data">
            @csrf
  
            <div class="mb-3">
          
                <label class="form-label" for="description">User</label>
                <textarea rows = "10" cols = "80" id = "my_user" name="my_user" placeholder="Enter description...">
                    
                </textarea>
  
                @error('files')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
   
            <div class="mb-3">
                <button type="submit" class="btn btn-success">search</button>
            </div>
       
        </form>
      
      </div>
    </div>
</div>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#my_user'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    
@endsection