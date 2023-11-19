@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form id="productForm" action="{{ route('products.create.step.one.post') }}" method="POST">
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
  
                            <div id="productsSection">
                                @foreach ($products as $key => $product)
                                    <div class="product">
                                        <h3>Product {{ $key + 1 }}</h3>
                                        <div class="form-group">
                                            <label for="products[{{ $key }}][name]">Product Name:</label>
                                            <input type="text" class="form-control" id="name_{{ $key }}" name="products[{{ $key }}][name]" value="{{ $product['name'] ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="products[{{ $key }}][amount]">Product Amount:</label>
                                            <input type="text" class="form-control" id="amount_{{ $key }}" name="products[{{ $key }}][amount]" value="{{ $product['amount'] ?? '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="products[{{ $key }}][description]">Product Description:</label>
                                            <textarea class="form-control" id="description_{{ $key }}" name="products[{{ $key }}][description]">{{ $product['description'] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
  
                        <div class="card-footer text-right">
                            <button type="button" id="addProductBtn">Add Product</button>
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let productCounter = {{ count($products) }}; // Count of existing products

            $('#addProductBtn').click(function() {
                productCounter++;

                let newProduct = `
                <div class="product">
                    <h3>Product ${productCounter}</h3>
                    <div class="form-group">
                        <label for="products[${productCounter - 1}][name]">Product Name:</label>
                        <input type="text" class="form-control" id="name_${productCounter}" name="products[${productCounter - 1}][name]" value="">
                    </div>
                    <div class="form-group">
                        <label for="products[${productCounter - 1}][amount]">Product Amount:</label>
                        <input type="text" class="form-control" id="amount_${productCounter}" name="products[${productCounter - 1}][amount]" value="">
                    </div>
                    <div class="form-group">
                        <label for="products[${productCounter - 1}][description]">Product Description:</label>
                        <textarea class="form-control" id="description_${productCounter}" name="products[${productCounter - 1}][description]"></textarea>
                    </div>
                </div>`;

                $('#productsSection').append(newProduct);
            });

            // $('#productForm').submit(function(e) {
            //     e.preventDefault();
            //     console.log("Form submitted"); 

            //     let formData = $(this).serialize();

            //     $.ajax({
            //         url: $(this).attr('action'),
            //         method: $(this).attr('method'),
            //         data: formData,
            //         success: function(response) {
            //             // Handle success response, if needed
            //             console.log("Ajax success:", response);
            //         },
            //         error: function(xhr, status, error) {
            //             // Handle error response, if needed
            //             console.log("Ajax error:", error);
            //         }
            //     });
            // });
        });
    </script>
@endsection
