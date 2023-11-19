<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
  
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function createStepOne()
    {
        // Initialize an empty array to store products or retrieve existing products from the session
        $products = session('products', [new Product()]);
    
        return view('products.create-step-one', compact('products'));
    }
    
    public function postCreateStepOne(Request $request)
    {
        // Validate the incoming form data for multiple products
        $validatedData = $request->validate([
            'products.*.name' => 'required|unique:products',
            'products.*.amount' => 'required|numeric',
            'products.*.description' => 'required',
        ]);
    
        // Create an array of Product instances from the validated data
        $products = [];
        foreach ($validatedData['products'] as $productData) {
            $product = new Product($productData);
            $products[] = $product;
        }
    
        // Store the products array in the session
        $request->session()->put('products', $products);
    
        return redirect()->route('products.create.step.two');
    }

    public function createStepTwo(){
    return view('products.create-step-two');
}

public function postCreateStepTwo(Request $request)
{
    // Validate that the terms checkbox is checked
    $request->validate([
        'terms' => 'accepted', // Add the appropriate validation rule here
    ], [
        'terms.accepted' => 'Please accept the terms and conditions',
    ]);

    // Redirect to step three if terms are accepted
    return redirect()->route('products.create.step.three');
}
public function createStepThree()
{
    // Retrieve the products from the session for display or finalization
    $products = session('products', [new Product()]);

    return view('products.create-step-three', compact('products'));
}

public function postCreateStepThree(Request $request)
{
    // Retrieve the products from the session
    $products = $request->session()->get('products');

    // Save each product to the database or perform any final processing
    foreach ($products as $product) {
        $product->save();
    }

    // Clear the session data after saving
    $request->session()->forget('products');

    return redirect()->route('products.index');
}

    
}
