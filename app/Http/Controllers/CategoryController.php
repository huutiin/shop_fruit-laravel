<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class CategoryController extends Controller
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
        //
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_productid)
    {
        $this->admin_dashboard();
        $edit_category_product = DB::table('product_category')->where('id_product_category',$category_productid)->get();
        $manager_category = view('admin.Category_Product.edit_category_product')->with('edit_category_product',$edit_category_product);

        return view('admin.dashboard')->with('admin.Category_Product.edit_category_product',$manager_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_productid)
    {
        $this->admin_dashboard();
        $data = array();
        $data['name_category'] = $request->category_name;
        $data['description_category'] = $request->description;

        DB::table('product_category')->where('id_product_category',$category_productid)->update($data);
        Session::put('message','Update category product success !');
        return Redirect::to('/all-category-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_productid)
    {
        $this->admin_dashboard();
        DB::table('product_category')->where('id_product_category',$category_productid)->delete();
        Session::put('message','Delete category product success !');
        return Redirect::to('/all-category-product');
    }
    //Category Product Controller
    public function add_category_product(){
        $this->admin_dashboard();
        return view('admin.Category_Product.add-category-product');
    }
    
    public function all_category_product(){
        $this->admin_dashboard();
        $all_category_product = DB::table('product_category')->get();
        $manager_category = view('admin.Category_Product.all-category-product')->with('all_category_product',$all_category_product);

        return view('admin.dashboard')->with('admin.Category_Product.all-category-product',$manager_category);

    }

    public function save_category_product(Request $request){
        $this->admin_dashboard();
        $data = array();
        $data['name_category'] = $request->category_name;
        $data['status'] = $request->category_product_status;
        $data['description_category'] = $request->description;

        DB::table('product_category')->insert($data);
        Session::put('message','Add new category product success !');
        return Redirect::to('/add-category-product');
    }

    public function active_category($category_productid)
    {
        $this->admin_dashboard();
        DB::table('product_category')->where('id_product_category',$category_productid)->update(['status'=>0]);
        Session::put('message','Hide category product success !');
        return Redirect::to('/all-category-product');
    }

    public function unactive_category($category_productid)
    {
        $this->admin_dashboard();
        DB::table('product_category')->where('id_product_category',$category_productid)->update(['status'=>1]);
        Session::put('message','Show category product success !');
        return Redirect::to('/all-category-product');
    }
}
