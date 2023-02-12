<?php

namespace App\Models;

/* use Illuminate\Database\Eloquent\Factories\HasFactory; */

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

    public function attribute_values()
    {
        return $this->hasMany(AttributeOptions::class);
    }
}
