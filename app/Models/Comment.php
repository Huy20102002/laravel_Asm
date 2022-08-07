<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['id_product','id_user','content'];
    public function User(){
        return $this->hasOne(User::class,'id','id_user');
    }
    public function product(){
        return $this->hasOne(Product::class,'id','id_product');
    }
}
