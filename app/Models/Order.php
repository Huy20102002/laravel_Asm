<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','address','country','district','zipcode','phone'];
    public function Cart(){
        return $this->hasMany(Cart::class,'id_order','id');
    }
}
