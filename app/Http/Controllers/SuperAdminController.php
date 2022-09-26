<?php

namespace App\Http\Controllers;

use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{

    // admin dashbord


    public function dashbord(){
        $this->AdminAuthCheck();
        return view('admin.dashbord');
    }

    public function logout(){
        Session::flush();
        return Redirect::to(path:'admin');
    }

    // dashbord likhle dashbord a na dhukate deyar function

public function AdminAuthCheck(){
    $admin_id=Session::get('admin_id');
    if($admin_id){
        return;

    }
else{
    return Redirect::to(path:'/admin')->send();
}


}
}
