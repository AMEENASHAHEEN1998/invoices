<?php

namespace App\Http\Controllers;

use App\products;
use App\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::all();
        $sections = sections::all();
        return view('products.products', compact('sections','products'));
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

        //dd($request->all());
        $product = new products();
        $product->product_name = $request->product_name;
        $product->section_id = $request->section_id;
        $product->description = $request->description;
        $product->save();
        /*products::create([
            'product_name' => $request->product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,


        ]);*/
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //$id = $request->id;
        $id = sections::where('section_name', $request->section_name)->first()->id;

        $product = products::findOrFail($request->pro_id);
        $product->update([
            'Product_name' => $request->product_name,
            'description' => $request->description,
            'section_id' => $id,
        ]);
        /*$this->validate($request, [

            'product_name' => 'required|max:255|unique:products,product_name,'.$id,

        ],[

            'product_name.required' =>'يرجي ادخال اسم المنتج',
            'product_name.unique' =>'اسم المنتج مسجل مسبقا',


        ]);*/


        //$product = products::find($id);

        /*$product->product_name = $request->product_name;
        $product->section_id = $request->section_id;
        $product->description = $request->description;
        $product->save();*/

        session()->flash('edit', 'تم تعديل المنتج بنجاح ');
        return redirect('/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->pro_id;
        products::find($id)->delete();
        session()->flash('delete','تم حذف المنتج بنجاح');
        return redirect('/products');
    }
}
