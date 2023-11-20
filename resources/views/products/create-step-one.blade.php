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
                                    <div class="product" id="product_${productCounter}">
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
                                        <button class="deleteSectionBtn" type="button" data-section-id="${productCounter}">Delete</button>
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
                <div class="product" id="product_${productCounter}">
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
                    <button class="deleteSectionBtn" data-section-id="${productCounter}">Delete</button>
                </div>`;

                $('#productsSection').append(newProduct);
            });

            $('.deleteSectionBtn').on('click', function() {
                let sectionId = $(this).data('section-id');

                $.ajax({
                    url: '/clear-section-data', // Endpoint to handle section data removal
                    method: 'POST',
                    data: { sectionId: sectionId },
                    success: function(response) {
                        // Handle success response
                        console.log('Section data deleted successfully.');
                        // Remove the section from the UI upon successful deletion
                        $(`#section_${sectionId}`).remove();
                        $(`#product_${sectionId}`).remove();
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error('Error deleting section data:', error);
                    }
                });
            });

            $(document).on('click', '.deleteSectionBtn', function() {
                let sectionId = $(this).data('section-id');
                $(`#product_${sectionId}`).remove();
            });

               // Handle delete button click using event delegation
            $('#productsSection').on('click', '.deleteSectionBtn', function() {
                let sectionId = $(this).data('section-id');
                $(`#product_${sectionId}`).remove();
            });

            // $(document).on('submit', '.deleteProductForm', function(e) {
            //     e.preventDefault();

            //     let sectionId = $(this).find('input[name="product_id"]').val();

            //     $.ajax({
            //         url: $(this).attr('action'),
            //         method: $(this).attr('method'),
            //         data: { sectionId: sectionId }, // Send the specific product ID or section ID to the server for deletion
            //         success: function(response) {
            //             // Handle success response if needed
            //             console.log('Product deleted successfully.');
            //             $(`#product_${sectionId}`).remove(); // Remove the section from the UI
            //         },
            //         error: function(xhr, status, error) {
            //             // Handle error response if needed
            //             console.error('Error deleting product:', error);
            //         }
            //     });
            // });

        });
    </script>
@endsection
