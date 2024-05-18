<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')
                            ->whereIsActive(true)
                            ->take(16)
                            ->orderBy('id', 'desc')
                            ->get();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        $filename = 'img_product_' . time() . '.' . $request->file('image')->extension();
        $path = $request->file('image')->storeAs(
            'productImage',
            $filename,
            'public'
        );
        
        $array_props = [];
        $array_props_value = [];
        foreach (array_unique($request->property_ids) as $value) {
            $array_props[] = (int)$value;
        }
        foreach ($request->property_value_ids as $value) {
            $array_props_value[] = (int)$value;
        }
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = (int)$request->category_id;
        $product->is_active = 1;
        $product->image_url = $path;
        $product->save();
        // add product properties and values
        $product->properties()->sync($array_props);
        $product->property_values()->sync($array_props_value);
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('category', 'properties', 'property_values')->find($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(true);
    }

    public function search(Request $request)
    {
        if (!$request->byCategory) {
            $products = Product::with('category')
                                ->whereIsActive(true)
                                ->where('name', 'LIKE' , "%{$request->byName}%")
                                ->orderBy('id', 'desc')
                                ->take(16)
                                ->get();
        } else {
            $products = Product::with('category')
                                ->whereIsActive(true)
                                ->where('name', 'LIKE' , "%{$request->byName}%")
                                ->where('category_id', $request->byCategory)
                                ->orderBy('id', 'desc')
                                ->take(16)
                                ->get();
        }
        return response()->json($products);
    }

}
