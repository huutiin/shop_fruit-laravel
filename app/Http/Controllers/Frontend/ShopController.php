<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function product_in_category($category_id)
    {
        $category = DB::table('product_category')->where('status','1')->orderBy('id_product_category','desc')->get();
        $product_in_category = DB::table('product')->join('product_category','product.id_product_category','=','product_category.id_product_category')
        ->where('product.id_product_category',$category_id)->get();
        return view('home.Shop.product_in_category', compact('category'), compact('product_in_category'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('product_category')->where('status','1')->orderBy('id_product_category','desc')->get();
        $brand = DB::table('brand')->where('status','1')->orderBy('id_brand','desc')->get();
        $all_product = DB::table('product')->where('status_product','1')->orderBy('id_product','desc')->get();
        return view('home.Shop.all_product', compact('all_product'), compact('category'), compact('brand'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_detail($product_id)
    {
        $category = DB::table('product_category')->where('status','1')->orderBy('id_product_category','desc')->get();
        $brand = DB::table('brand')->where('status','1')->orderBy('id_brand','desc')->get();
        $product_detail = DB::table('product')
        ->join('product_category','product_category.id_product_category','=','product.id_product_category')
        ->join('brand','brand.id_brand','=','product.id_brand')->where('product.id_product',$product_id)->get();

        foreach ($product_detail as $key => $value){
            $category_id = $value->id_product_category;
        }
        $related_product = DB::table('product')
        ->join('product_category','product_category.id_product_category','=','product.id_product_category')
        ->join('brand','brand.id_brand','=','product.id_brand')
        ->where('product_category.id_product_category',$category_id)->whereNotIn('product.id_product',[$product_id])->get();

        return view('home.Shop.product_detail', compact('product_detail'), compact('related_product'), compact('category'), compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }
}
