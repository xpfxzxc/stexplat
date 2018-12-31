<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentRequest;
use Auth;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StudentRequest $request)
    {
        $this->authorize('student-store');
        $student = new Student;
        $student->college = $request->college;
        $student->major = $request->major;
        $student->grade = $request->grade;
        $student->cell_phone = $request->cell_phone;
        $student->user_id = Auth::id();
        $student->save();
        Auth::user()->assignRole('Student');
        return redirect()->route('root')->with('success', '个人信息完善成功！');
    }
}
