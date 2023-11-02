<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class BrandController extends Controller
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
    public function edit($brand_id)
    {
        $this->admin_dashboard();
        $edit_brand_product = DB::table('brand') -> where('id_brand',$brand_id) -> get();
        $manager_brand_product = view('admin.Brand.edit_brand_product') ->with('edit_brand_product',$edit_brand_product);
        return view('admin.dashboard')->with('admin.Brand.edit_brand_product',$manager_brand_product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brand_id)
    {
        $this->admin_dashboard();
        $data = array();
        $data['name_brand'] = $request->brand_name;
        $data['address'] = $request->address_brand;
        DB::table('brand')->where('id_brand',$brand_id)->update($data);
        Session::put('message','Update brand product success !');
        return Redirect::to('/all-brand-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand_id)
    {
        $this->admin_dashboard();
        DB::table('brand')->where('id_brand',$brand_id)->delete();
        Session::put('message','Delete brand product success !');
        return Redirect::to('/all-brand-product');
    }
    // Brand Product Controller
    public function add_brand_product()
    {
        $this->admin_dashboard();
        return view('admin.Brand.add_brand_product');
    }
    public function save_brand_product(Request $request)
    {
        $this->admin_dashboard();
        $data = array();
        $data['name_brand'] = $request->brand_name;
        $data['address'] = $request->address;
        $data['status'] = $request->brand_product_status;
        $data['slug_brand'] = $request->slug;
        DB::table('brand')->insert($data);
        Session::put('message','Add new brand success !');
        return Redirect::to('/add-brand-product');
    }
    public function all_brand_product(){
        $this->admin_dashboard();
        $all_brand_product = DB::table('brand')->get();
        $manager_brand = view('admin.Brand.all_brand_product')->with('all_brand_product',$all_brand_product);

        return view('admin.dashboard')->with('admin.Brand.all_brand_product',$manager_brand);

    }
    public function active_brand($brand_id)
    {
        $this->admin_dashboard();
        DB::table('brand')->where('id_brand',$brand_id)->update(['status'=>0]);
        Session::put(' message','Hide brand product success !');
        return Redirect::to('/all-brand-product');
    }
    public function unactive_brand($brand_id)
    {
        $this->admin_dashboard();
        DB::table('brand')->where('id_brand',$brand_id)->update(['status'=>1]);
        Session::put(' message','Show product success !');
        return Redirect::to('/all-brand-product');
    }
}
