<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productmaterial extends Model
{
    public function material(){
        return $this->hasOne(Material::class, 'id', 'material_id');
    }
}
