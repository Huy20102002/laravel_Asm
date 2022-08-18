<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Size;
use App\Models\Color;
class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['id_order', 'id_product', 'id_user', 'id_size', 'id_color', 'quantity', 'price'];
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }
    public function size(){
        return $this->hasOne(Size::class,'id','id_size');
    }
    public function color(){
        return $this->hasOne(Color::class,'id','id_color');
    }
}
