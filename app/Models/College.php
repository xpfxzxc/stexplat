<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = ['badge', 'region', 'address', 'tel', 'introduction'];
}
