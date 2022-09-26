<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories=SubCategory::all();
        return view('admin.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories=Category::all();
        return view('admin.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory=new SubCategory;
        $subcategory->cat_id=$request->category;
        $subcategory->name=$request->name;
        $subcategory->description=$request->description;


        // if ($request->hasFile(key:'image')){

        //     $file= $request->file(key:'image');
        //     $extension= $file->getClientOriginalExtension();
        //     $filename=time().'.'.$extension;
        //     $file->move(directory:'Category'.$filename);
        //     $category->image= $filename;

        // }
        $subcategory->save();
        return redirect()->back()->with('message','subcategory Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(SubCategory $subcategory)
    {
        if($subcategory->status==1){
            $subcategory->update(['status'=>0]);
        }
        else{
            $subcategory->update(['status'=>1]);

        }
        return redirect()->back()->with('message','Status change Successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        $categories=Category::all();
        return view('admin.subcategory.edit',compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SubCategory $subcategory)
    {
        $update=$subcategory->update([
            'name'=>$request->name,
            'cat_id'=>$request->category,
            'description'=>$request->description,


        ]);


        if($update){
            return redirect(to:'/sub-categories')->with('message','SUBCategory Updated Succssfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subcategory)
    {
        $delete=SubCategory::find($subcategory);
        $delete->delete();
        return redirect(to:'sub-categories')->with('message','SUBCategory Delete Succssfully');



    }


}


