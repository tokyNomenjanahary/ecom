<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\Repositories\cartRepository;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartContent = (new cartRepository())->content();
        $cartCount = (new cartRepository())->count();
        return response()->json([
            'cartContent' => $cartContent,
            'cartCount' => $cartCount
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::where('id', $request->productId)->first();
        $count = (new cartRepository())->add($product);
        return response()->json([
            'count' => $count
        ]);
        // return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new cartRepository())->remove($id);
    }

    public function count()
    {
        $count = (new cartRepository())->count();
        return response()->json([
            'count' => $count
        ]);
    }

    public function increase($id)
    {
        (new cartRepository())->increase($id);
    }

    public function decrease($id)
    {
        (new cartRepository())->decrease($id);
    }
}
