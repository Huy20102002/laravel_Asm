<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','price','image',
        'overview','description','quantity',
        'status','category_id',
        'sale','discount'
    ];
    // Quan hệ 1 danh mục có nhiều sản phẩm
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function product_detail(){
        return $this->hasOne(Product_detail::class,'product_id','id');
    }
    public function size(){
        return $this->hasOne(Size::class,'id','size_id');
    }
    public function comment(){
        return $this->hasMany(Comment::class,'id_product','id');
    }

}
