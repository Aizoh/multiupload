@extends('layouts.app')
@section('content')
<div class="container">
       
    <div class="panel panel-primary">
  
      <div class="panel-heading">
        <h2>My Multiple File Upload</h2>
      </div>
      <a href="{{route('file.myfile')}}">My files</a>
  
      <div class="panel-body">
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
      
        <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
  
            <div class="mb-3">
                <label class="form-label" for="inputFile">Select Files:</label>
                <input 
                    type="file" 
                    name="files[]" 
                    id="inputFile"
                    multiple 
                    class="form-control @error('files') is-invalid @enderror">
                <br>
                <label class="form-label" for="description">Description</label>
                <textarea rows = "10" cols = "80" id = "description" name="description" placeholder="Enter description...">
                    
                </textarea>
  
                @error('files')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
   
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
       
        </form>
      
      </div>
    </div>
</div>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    
@endsection