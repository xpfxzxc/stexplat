<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Student;
use App\Models\College;
use App\Models\Course;
use Auth;

class RegistersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $student = Auth::user()->student;
        $register = new Register;
        $register->student_id = $request->student_id;
        $register->college_id = $request->college_id;
        $register->course_id = $request->course_id;
        $register->data = json_encode([
            'student_name' => Auth::user()->name,
            'student_major' => $student->major,
            'student_college' => $student->college,
            'student_cell_phone' => $student->cell_phone,
            'student_grade' => $student->grade,
            'course_name' => $request->course_name,
            'college_name' => $request->college_name,
        ]);
        $register->save();
        $course = Course::find($request->course_id);
        $course->updateRegisterCount();
        $college = College::find($request->college_id);
        $college->updateRegisterCount();
        return redirect()->back()->with('success', '申请中，请注意院校的联系！');
    }

    public function check()
    {
        $registers = [];
        $user = Auth::user();
        if ($user->hasRole('Student')) {
            $registers = Register::where('student_id', $user->id)->paginate(20);
        } else if ($user->hasRole('College')) {
            $registers = Register::where('college_id', $user->id)->paginate(20);
        }
        foreach ($registers as &$register) {
            $register->data = json_decode($register->data);
        }
        return view('notifications.show', compact('registers'));
    }

    public function change_status(Request $request)
    {

    }
}
