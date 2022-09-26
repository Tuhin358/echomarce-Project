<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $cat_id
 * @property int $subcat_id
 * @property int $br_id
 * @property int $unit_id
 * @property int $size_id
 * @property int $color_id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $image
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Color|null $color
 * @property-read \App\Models\Size|null $size
 * @property-read \App\Models\SubCategory|null $subcategory
 * @property-read \App\Models\Unit|null $unit
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSizeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSubcatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable=['id','cat_id','subcat_id','br_id','unit_id','size_id','color_id','code','name','description','price','image','status' ];


    public function category(){
        return $this->belongsTo(related:Category::class,foreignKey:'cat_id');

    }

    public function subcategory(){
        return $this->belongsTo(related:SubCategory::class,foreignKey:'subcat_id');

    }
    public function brand(){
        return $this->belongsTo(related:Brand::class,foreignKey:'br_id');

    }
    public function unit(){
        return $this->belongsTo(related:Unit::class,foreignKey:'unit_id');

    }
    public function size(){
        return $this->belongsTo(related:Size::class,foreignKey:'size_id');

    }
    public function color(){
        return $this->belongsTo(related:Color::class,foreignKey:'color_id');

    }


    public static function catProductCount($cat_id){
        $catCount=Product::where('cat_id',$cat_id)->where('status',1)->count();
        return  $catCount;


    }




    public static function subcatProductCount($subcat_id){
        $subcatCount=Product::where('subcat_id',$subcat_id)->where('status',1)->count();
        return  $subcatCount;


    }


    public static function brandProductCount($br_id){
        $brandCount=Product::where('br_id',$br_id)->where('status',1)->count();
        return  $brandCount;


    }






}
