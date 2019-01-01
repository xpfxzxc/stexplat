<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Handlers\ImageUploadHandler;
use App\Models\Course;
use Auth;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'show']]);
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function index()
    {
        $courses = Course::paginate(15);
        return view('courses.index', compact('courses'));
    }

    public function create(Course $course)
    {
        return view('courses.create_and_edit', compact('course'));
    }

    public function store(CourseRequest $request, ImageUploadHandler $uploader)
    {
        $data = $request->all();

        $result = $uploader->save($request->banner, 'banner', Auth::id(), 416);
        $data['banner'] = $result['path'];

        Auth::user()->college->courses()->create($data);

        return redirect()->route('root')->with('success', '成功添加新课程！');
    }

    public function update(CourseRequest $request, ImageUploadHandler $uploader, Course $course)
    {
        $data = $request->all();
        $result = $uploader->save($request->banner, 'banner', Auth::id(), 416);

        $data['banner'] = $result['path'];

        $course->update($data);

        return redirect()->route('courses.show', $course->id)->with('success', '成功更新课程！');
    }

    public function edit(Course $course)
    {
        return view('courses.create_and_edit', compact('course'));
    }

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'courses', Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}
