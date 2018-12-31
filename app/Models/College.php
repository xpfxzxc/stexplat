<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class College extends Model
{
    protected $fillable = ['badge', 'region', 'address', 'tel', 'introduction'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
