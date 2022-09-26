<?php

namespace App\Http\Controllers;
// use App\Http\Request;

use Illuminate\Http\Request;
use App\Models\Admin;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;





class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }




    // admin dashbord


    // public function dashbord(){
    //     return view('admin.dashbord');
    // }

    public function show_dashbord(Request $request){


        $admin_email=$request->email;
        $admin_password=md5($request->password);
        $result=Admin::where('admin_email',$admin_email)-> where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);

             return Redirect::to(path:'dashbord');

        }


        else{

            Session::put('message',"Email and Password invelid");

             return Redirect::to(path:'admin');

        }


    }

}
