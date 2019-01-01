<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|between:3,20|regex:/^[\x{4e00}-\x{9fa5}A-Za-z]+$/u',
            'instructor' => 'required|between:2,40|regex:/^[\x{4e00}-\x{9fa5}A-Za-z ]+$/u',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start',
            'body' => 'min:200',
            'banner' => 'required|mimes:jpeg,bmp,png,gif|dimensions:min_width=208,min_height=208',
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'必须填写课程名称',
            'name.between' => '课程名称必须介于 3 - 20 个字符之间',
            'name.regex' => '课程名称只支持中文、英文',
            'banner.required' =>'必须上传横幅',
            'banner.mimes' =>'横幅必须是 jpeg, bmp, png, gif 格式的图片',
            'banner.dimensions' => '横幅的清晰度不够，宽和高需要 208px 以上',
            'instructor.required' => '讲师名字不能为空',
            'instructor.between' => '讲师名字必须介于 2 - 40 个字符之间',
            'instructor.regex' => '讲师名字只支持中文、英文、空格',
            'start_at.required' => '开始日期不能为空',
            'start_at.date' => '必须是合法的开始日期',
            'end_at.required' => '结束日期不能为空',
            'end_at.date' => '必须是合法的结束日期',
            'end_at.after' => '结束日期必须是开始日期后',
            'body.min' => '课程描述不能少于 200 个字符',
        ];
    }
}
