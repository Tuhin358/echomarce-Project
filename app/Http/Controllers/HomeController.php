<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Unit;
use Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{


    public function index(){


        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        $sizes=Size::all();
        $colors=Color::all();
        $products=Product::where('status', 1)->latest()->limit(12)->get();


// start top_saleing code

        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(8)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }

// end top_saleing code




        return view('frontend.welcome',compact('categories','subcategories','brands','units','sizes','colors' ,'products','topProducts'));


        return view();
    }



    public function view_details($id){

        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        $products=Product::findOrFail($id);
        $sizes=Size::find($products->size_id);
        $colors=Color::find($products->color_id);
        $cat_id=$products->cat_id;
        $related_products=Product::where('cat_id', $cat_id)->limit(4)->get();


        return view('frontend.pages.view_details',compact('categories','subcategories','brands','units','products','sizes','colors','related_products' ));

    }

    public function product_by_cat($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('cat_id',$id)->limit(12)->get();

        return view('frontend.pages.product_by_cat',compact('categories','subcategories','brands','products'));


    }


    public function product_by_subcat($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('subcat_id',$id)->limit(12)->get();

        return view('frontend.pages.product_by_subcat',compact('categories','subcategories','brands','products'));


    }

    public function search(Request $request){
        $products=Product::orderBy('id','desc')->where('name','LIKE','%'.$request->product.'%' );

        if($request->category != "ALL") $products->where('cat_id', $request->category);

        $products=$products->get();


        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();


         return view('frontend.pages.product_by_cat',compact('products','categories','subcategories','brands'));




    }






}
