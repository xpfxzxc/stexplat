<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'college' => 'required|between:3,60|regex:/^[\x{4e00}-\x{9fa5}-（）]+$/u',
            'grade' => 'required|between:2,5|regex:/^[\x{4e00}-\x{9fa5}]+$/u',
            'major' => 'required|between:2,20|regex:/^[\x{4e00}-\x{9fa5}]+$/u',
            'cell_phone' => 'required|min:4|integer',
        ];
    }

    public function messages()
    {
        return [
            'college.required' => '就读院校不能为空',
            'college.between' => '就读院校必须介于 3 - 60 个字符之间',
            'college.regex' => '就读院校只支持中文、括号、横杠',
            'grade.required' => '年级不能为空',
            'grade.between' => '年级必须介于 2 - 5 个字符之间',
            'grade.regex' => '年级只支持中文',
            'major.required' => '专业不能为空',
            'major.between' => '专业必须介于 2 - 20 个字符之间',
            'major.regex' => '专业只支持中文字符',
            'cell_phone.required' => '手机号码不能为空',
            'cell_phone.min' => '手机号码长度必须大于等于4',
            'cell_phone.integer' => '手机号码必须是数字',
        ];
    }
}
