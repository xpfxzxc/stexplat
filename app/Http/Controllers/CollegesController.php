<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CollegeRequest;
use App\Handlers\ImageUploadHandler;
use App\Models\User;
use App\Models\College;
use Auth;

class CollegesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    public function index()
    {
        $colleges = College::orderBy('created_at', 'desc')->paginate(15);
        return view('colleges.index', compact('colleges'));
    }

    public function show(College $college)
    {
        $user = $college->user;
        $courses = $college->courses()->paginate(10);
        return view('colleges.show', compact('college', 'user', 'courses'));
    }

    public function store(CollegeRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $this->authorize('college-store');
        $college = new College;
        $college->region = $request->region;
        $college->address = $request->address;
        $college->tel = $request->tel;
        $college->introduction = $request->introduction;

        $result = $uploader->save($request->badge, 'badge', $user->id, 416);
        if ($result) {
            $college->badge = $result['path'];
        }

        $college->user_id = Auth::id();
        $college->save();
        Auth::user()->assignRole('College');
        return redirect()->route('root')->with('success', '院校信息完善成功！');
    }
}
