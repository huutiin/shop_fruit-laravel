<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'id_product_category','id_brand','name_product', 'price', 'unit_calculation', 'discount','discription','status','slug'
    ];
    protected $primaryKey = 'id_product';
    protected $table = 'product';
    
}
