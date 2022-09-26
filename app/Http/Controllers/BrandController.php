<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand=new Brand();
        $brand->name=$request->name;
        $brand->description=$request->description;

        // if ($request->hasFile(key:'image')){

        //     $file= $request->file(key:'image');
        //     $extension= $file->getClientOriginalExtension();
        //     $filename=time().'.'.$extension;
        //     $file->move(directory:'Category'.$filename);
        //     $category->image= $filename;

        // }

        $brand->save();
        return redirect()->back()->with('message','Brand Added Successfully ');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Brand $brand)
    {
        if($brand->status==1){
            $brand->update(['status'=>0]);
        }
        else{
            $brand->update(['status'=>1]);

        }
        return redirect()->back()->with('message','Status change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $update=$brand->update([
            'name'=>$request->name,
            'description'=>$request->description,


        ]);


        if($update){
            return redirect(to:'/brands')->with('message','Category Updated Succssfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $delete=$brand->delete();
        if($delete){
            return redirect()->back()->with('message','Brand Delete Successfully');
        }
    }
}
