<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'cus_id',
        'ship_id',
        'pay_id',
        'total',
        'status',
];

public function Customer(){
    return $this->belongsTo(related:Customer::class,foreignKey:'cus_id');

}

public function Shipping(){
    return $this->belongsTo(related:Shipping::class,foreignKey:'ship_id');

}

public function Payment(){
    return $this->belongsTo(related:Payment::class,foreignKey:'pay_id');

}






}
