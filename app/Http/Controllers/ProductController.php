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

    public function createStepOne(Request $request)
    {
        $product = $request->session()->get('product');
  
        return view('products.create-step-one',compact('product'));
    }
  
 
    // public function postCreateStepOne(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required|unique:products',
    //         'amount' => 'required|numeric',
    //         'description' => 'required',
    //     ]);
  
    //     if(empty($request->session()->get('product'))){
    //         $product = new Product();
    //         $product->fill($validatedData);
    //         $request->session()->put('product', $product);
    //     }else{
    //         $product = $request->session()->get('product');
    //         $product->fill($validatedData);
    //         $request->session()->put('product', $product);
    //     }
  
    //     return redirect()->route('products.create.step.two');
    // }


//     $products[] = $product;
// }

// You might save the products to the database here or store them in the session for further processing

// For example, if you want to store in the session:
// $request->session()->put('products', $products);

// return redirect()->route('products.create.step.two');
public function postCreateStepOne(Request $request)
{
    $validatedData = $request->validate([
        'products.*.name' => 'required|unique:products,name',
        'products.*.amount' => 'required|numeric',
        'products.*.description' => 'required',
    ]);

    // Loop through the submitted products
    foreach ($validatedData['products'] as $productData) {
        $product = new Product([
            'name' => $productData['name'],
            'amount' => $productData['amount'],
            'description' => $productData['description'],
        ]);
        $products[] = $product;
        // Process or save the product as needed
    }
    $request->session()->put('products', $products);
    return redirect()->route('products.create.step.two');
}

    
 
    public function createStepTwo(Request $request)
    {
        $product = $request->session()->get('product');
  
        return view('products.create-step-two',compact('product'));
    }
  
 
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'stock' => 'required',
            'status' => 'required',
        ]);
  
        $product = $request->session()->get('product');
        $product->fill($validatedData);
        $request->session()->put('product', $product);
  
        return redirect()->route('products.create.step.three');
    }
  

    public function createStepThree(Request $request)
    {
        $product = $request->session()->get('product');
  
        return view('products.create-step-three',compact('product'));
    }
 
    public function postCreateStepThree(Request $request)
    {
        $product = $request->session()->get('product');
        $product->save();
  
        $request->session()->forget('product');
  
        return redirect()->route('products.index');
    }
}
