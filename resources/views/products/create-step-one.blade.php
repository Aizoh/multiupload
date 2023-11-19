@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('products.create.step.one.post') }}" method="POST">
                @csrf
  
                <div class="card">
                    <div class="card-header">Step 1: Basic Info</div>
  
                    <div class="card-body">
  
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
  
                            <div class="form-group">
                                <label for="title">Product Name:</label>
                                <input type="text" value="{{ $product->name ?? '' }}" class="form-control" id="taskTitle" name="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Product Amount:</label>
                                <input type="text" value="{{{ $product->amount ?? '' }}}" class="form-control" id="productAmount" name="amount"/>
                            </div>
   
                            <div class="form-group">
                                <label for="description">Product Description:</label>
                                <textarea type="text" class="form-control" id="taskDescription" name="description">{{{ $product->description ?? '' }}}</textarea>
                            </div>
                         <!-- Dynamic form fields -->
                        <div id="dynamicFormsContainer">
                            <!-- Initially, this will be empty -->
                        </div>
                          
                    </div>
  
                    <div class="card-footer text-right">
                        
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>
            <button type="button" id="addFormButton">Add Form</button>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let formCounter = 0;

        $('#addFormButton').click(function() {
    formCounter++;

    let newForm = `
        <div class="form-group">
            <label for="title">Product Name:</label>
            <input type="text" class="form-control" name="products[${formCounter}][name]">
        </div>
        <div class="form-group">
            <label for="description">Product Amount:</label>
            <input type="text" class="form-control" name="products[${formCounter}][amount]"/>
        </div>
        <div class="form-group">
            <label for="description">Product Description:</label>
            <textarea class="form-control" name="products[${formCounter}][description]"></textarea>
        </div>
    `;

    $('#dynamicFormsContainer').append(newForm);
});

    });
</script>

@endsection