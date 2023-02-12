<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupan extends Model
{
    protected $fillable = ['type', 'code', 'details', 'discount', 'discount_type', 'start_date', 'end_date'];
}
