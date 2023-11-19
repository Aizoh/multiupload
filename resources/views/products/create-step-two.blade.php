@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('products.create.step.two.post') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">Step 2: Terms and conditions</div>
  
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
  
                            {{-- <div class="form-group">
                                <label for="description">Product Status</label><br/>
                                <label class="radio-inline"><input type="radio" name="status" value="1" {{{ (isset($product->status) && $product->status == '1') ? "checked" : "" }}}> Active</label>
                                <label class="radio-inline"><input type="radio" name="status" value="0" {{{ (isset($product->status) && $product->status == '0') ? "checked" : "" }}}> DeActive</label>
                            </div> --}}
                            <div class="form-group">
                                <label for="terms">Terms and Conditions</label><br/>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="terms" id="termsCheckbox">
                                    I agree to the terms and conditions
                                </label>
                            </div>
                            
  
                            {{-- <div class="form-group">
                                <label for="description">Product Stock</label>
                                <input type="text"  value="{{{ $product->stock ?? '' }}}" class="form-control" id="productAmount" name="stock"/>
                            </div> --}}
  
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('products.create.step.one') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary" id="nextButton" >Next</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
{{-- @section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#termsCheckbox').change(function() {
            if (this.checked) {
                $('#nextButton').show(); // Show the Next button when the checkbox is checked
            } else {
                $('#nextButton').hide(); // Hide the Next button when the checkbox is unchecked
            }
        });
    });
</script>

@endsection --}}