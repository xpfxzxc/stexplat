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

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'college_id', 'id');
    }

    public function updateRegisterCount()
    {
        $this->register_count = \App\Models\Register::where('college_id', $this->id)->count();
        $this->save();
    }
}
