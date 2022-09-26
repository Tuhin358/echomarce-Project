<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes=Size::all();
        return view('admin.size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $sizes=explode(',',$request->size);
        $size=new Size();
        $size->size=json_encode ($sizes);

        $size->save();
        return redirect()->back()->with('message','Size Added Successfully ');


        // if ($request->hasFile(key:'image')){

        //     $file= $request->file(key:'image');
        //     $extension= $file->getClientOriginalExtension();
        //     $filename=time().'.'.$extension;
        //     $file->move(directory:'Category'.$filename);
        //     $category->image= $filename;

        // }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Size $size)
    {
        if($size->status==1){
            $size->update(['status'=>0]);
        }
        else{
            $size->update(['status'=>1]);

        }
        return redirect()->back()->with('message','Status change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $sizes=explode(',',$request->size);

        $update=$size->update([
            'size'=>json_encode ($sizes),



        ]);


        if($update){
            return redirect(to:'/sizes')->with('message','Size Updated Succssfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $delete=$size->delete();
        if($delete){
            return redirect()->back()->with('message','Size Delete Successfully');
        }
    }
}
