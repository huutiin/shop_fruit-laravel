<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class BackendController extends Controller
{
    public function loginadmin(){
        return view('admin.login');
    }
    public function admin_dashboard(){
        $name = Session::get('name');
        if($name){
            return view('admin.index');
            
        }else{
            return view('admin.null');
        }
    }
    public function error(){
        return view('admin.null');
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('account_admin')->where('email',$admin_email)->where('pass',$admin_password)->first();
        if($result){
            Session::put('name',$result->name);
            Session::put('id_account',$result->id_account);
            return Redirect::to('/admin-dashboard');
        }else
        {
            Session::put('message','Email hoac Mat Khau khong dung. Vui long nhap lai !');
            return Redirect::to('/admin');

        }
    }
    public function log_out(){
        $this->admin_dashboard();
        Session::put('name',null);
        Session::put('id_account',null);
        return Redirect::to('/admin');

    } 
}
