<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class,'category_id','id');
    }
}
