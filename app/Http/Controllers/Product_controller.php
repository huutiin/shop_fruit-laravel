<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\Product_Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
session_start();

class Product_controller extends Controller
{
    public function admin_dashboard(){
        $name = Session::get('name');
        if($name){
            return Redirect::to('/admin-dashboard');
            
        }else{
            return Redirect::to('/error')->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->admin_dashboard();
        $categories_product = DB::table('product_category')->orderBy('id_product_category','desc')-> get();
        $brand_product = DB::table('brand')->orderBy('id_brand','desc')-> get();
        return view('admin.Product.add_product', compact('categories_product'), compact('brand_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->admin_dashboard();
        $data = array();
        $data['id_product_category'] = $request->product_category;
        $data['id_brand'] = $request->product_brand;
        $data['name_product'] = $request->product_name;
        $data['price'] = $request->price_product;
        $data['unit_calculation'] = $request->unit_calculation_product;
        $data['discount'] = $request->discount_product;
        $data['discription'] = $request->description_product;
        $data['status_product'] = $request->status_product;
        $data['slug'] = $request->slug_product;
        $get_image = $request->file('image_product');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/products',$new_image);
            $data['images'] = $new_image;
            DB::table('product')->insert($data);
            Session::put('message','Add new product success !');
            return Redirect::to('/add-product');
        }
        $data['images'] = '';
        DB::table('product')->insert($data);
        Session::put('message','Add new product success !');
        return Redirect::to('/add-product');
    }
    public function active_product($product_id)
    {
        $this->admin_dashboard();
        DB::table('product')->where('id_product',$product_id)->update(['status_product'=>0]);
        Session::put('message','Hide product success !');
        return Redirect::to('/all-product');
    }
    public function unactive_product($product_id)
    {
        $this->admin_dashboard();
        DB::table('product')->where('id_product',$product_id)->update(['status_product'=>1]);
        Session::put('message','Show product success !');
        return Redirect::to('/all-product');
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
    public function show()
    {
        $this->admin_dashboard();
        $all_product = DB::table('product')
        ->join('product_category','product_category.id_product_category','=','product.id_product_category')
        ->join('brand','brand.id_brand','=','product.id_brand')->orderBy('id_product','desc')->get();
        $manager_product = view('admin.Product.all_product')->with('all_product',$all_product);
        return view('admin.dashboard')->with('admin.Product.all_product', $manager_product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        $this->admin_dashboard();
        $cate_product = DB::table('product_category')->orderBy('id_product_category','desc')->get();
        $brand_product = DB::table('brand')->orderBy('id_brand','desc')->get();

        $edit_product = DB::table('product')->where('id_product',$product_id)->get();
        $manager_product = view('admin.Product.edit_product')
        ->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product);
        return view('/admin.dashboard')->with('admin.Product.edit_product',$manager_product);        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $this->admin_dashboard();
        $data = array();
        $data['id_product_category'] = $request->product_category;
        $data['id_brand'] = $request->product_brand;
        $data['name_product'] = $request->product_name;
        $data['price'] = $request->price_product;
        $data['unit_calculation'] = $request->unit_calculation_product;
        $data['discount'] = $request->discount_product;
        $data['discription'] = $request->description_product;
        $data['slug'] = $request->slug_product;
        $get_image = $request->file('image_product');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/products',$new_image);
            $data['images'] = $new_image;
            DB::table('product')->where('id_product',$product_id)->update($data);
            Session::put('message','Update product success !');
            return Redirect::to('/all-product');
        }
        DB::table('product')->where('id_product',$product_id)->update($data);
        Session::put('message','Update product success !');
        return Redirect::to('/all-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $this->admin_dashboard();
        DB::table('product')->where('id_product',$product_id)->delete();
        Session::put('message','Delete product success !');
        return Redirect::to('/all-product');
    }

}
