<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    use HasFactory;
    protected $table =  'product_details';
    protected $fillable = [
        'product_id','view','price_sale','size_id','color_id'
    ];
    public function size(){
        return $this->hasOne(Size::class,'id','size_id');
    }
    public function color(){
        return $this->hasOne(Color::class,'id','color_id');
    }
}
