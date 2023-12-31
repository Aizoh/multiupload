<!DOCTYPE html>
<html>
<head>
    <title>Multiple File Uploads</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
      
<body>
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

        @if(session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

      
        <div class="table-responsive">
            <table class="table">
              <thead>
                <td>Name</td>
                <td>Created</td>
                <td>Descriptionsss</td>
              </thead>
              @foreach ($files as $file)
              <tr>
                <td><a href="{{route('file.file', $file->id)}}">{{$file->name}}</a></td>
                <td><a href="{{route('file.json', $file->id)}}">{{$file->created_at}}</a></td>
                <td>{!! $file->description !!}</td>
              </tr>
              @endforeach
            </table>
          </div>

       
            
        
      </div>
    </div>
</div>
</body>

</html>              