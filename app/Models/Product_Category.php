<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'product_category';
    protected $primaryKey = 'id_product_category';
    protected $fillable = [
        'name_category','description_category','status'
    ];
}
