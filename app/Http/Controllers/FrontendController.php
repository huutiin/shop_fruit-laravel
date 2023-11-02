<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function admin_dashboard(){
        $name = Session::get('name');
        if($name){
            return Redirect::to('/admin-dashboard');
            
        }else{
            return Redirect::to('/error')->send();
        }
    }
    public function index()
    {
        $all_product_index = DB::table('product')->where('status_product','1')->orderBy('id_product','desc')->limit(4)->get();
        return view('home.index', compact('all_product_index'));
    }
    public function about()
    {
        return view('home.about');
    }
    public function cart(Request $request)
    {
        // $data = array();
        // $data[''] = $request->
        // $data[''] = $request->
        // $data[''] = $request->
        // $data[''] = $request->
        // $data[''] = $request->
        $product_id = $request->product_id;
        $quantity = $request->quantity;
        $data = DB::table('product')->where('id_product',$product_id)->get();
        return view('home.cart');
    }
    public function checkout()
    {
        return view('home.checkout');
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function shop()
    {
        return view('home.Shop.shop');
    }
    public function product_detail()
    {
        return view('home.product_detail');
    }
    public function error()
    {
        return view('home.error');
    }
    public function getall()
    {
        return Product::all();
    }
}
