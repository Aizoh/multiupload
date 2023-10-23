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
      
        <div class="table-responsive">
            <table class="table">
              <thead>
                <td>Name</td>
                <td>Created</td>
                <td>Description</td>
              </thead>
              @foreach ($files as $file)
              <tr>
                <td>{{$file->name}}</td>
                <td>{{$file->created_at}}</td>
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