<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'productName'  => 'required',
            'productSlug'  => 'required',
            'productPrice' => 'required',

        ]);
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
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
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }


    /**
     * Searches resource from storage by Product name.
     *
     * @param  str  $productName
     * @return \Illuminate\Http\Response
     */
    public function searchByProductName($productName)
    {
        return Product::where('productName', 'like' , '%' . $productName . '%' )->get();
    }


    /**
     * Searches resource from storage by Product id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchByProductId($id)
    {
        return Product::where('id', $id)->get();
    }


    // /**
    //  * Searches resource from storage by Product price.
    //  *
    //  * @param  int  $productPrice
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     return Product::destroy($id);
    // }
}
