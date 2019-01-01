<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'banner', 'category', 'start_at', 'end_at', 'instructor', 'body'];

    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id', 'id');
    }

    public function updateRegisterCount()
    {
        $this->register_count = \App\Models\Register::where('course_id', $this->id)->count();
        $this->save();
    }
}
