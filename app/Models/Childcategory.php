<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function subcategory()
    {
        return $this->hasOne(Subcategory::class, 'id','subcategory_id');
    }
    public function products(){
        return $this->hasMany(Product::class, 'childcategory_id')->select('id','childcategory_id','status')->where('status', 1);
    }

}
