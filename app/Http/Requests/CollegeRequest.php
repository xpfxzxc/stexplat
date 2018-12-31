<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollegeRequest extends FormRequest
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
            'badge' => 'required|mimes:jpeg,bmp,png,gif|dimensions:min_width=208,min_height=208',
            'region' => 'required|between:2,10|regex:/^[\x{4e00}-\x{9fa5}]+$/u',
            'address' => 'required|between:2,40|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9（）]+$/u',
            'tel' => 'required|regex:/^[0-9\-]+$/u|max:30',
            'introduction' => 'required|max:200',
        ];
    }

    public function messages()
    {
        return [
            'badge.mimes' =>'必须上传校徽',
            'badge.mimes' =>'校徽必须是 jpeg, bmp, png, gif 格式的图片',
            'badge.dimensions' => '校徽的清晰度不够，宽和高需要 208px 以上',
            'region.required' => '地区不能为空',
            'region.between' => '地区必须介于 2 - 10 个字符之间',
            'region.regex' => '地区只支持中文字符',
            'address.required' => '地址不能为空',
            'address.between' => '地址必须介于 2 - 40 个字符之间',
            'address.regex' => '地址只支持中文、英文、数字、中文括号',
            'tel.required' => '联系方式不能为空',
            'tel.regex' => '地址只支持中数字、横杠',
            'tel.max' => '联系方式不能超过30个字符',
            'introduction.required' => '简介不能为空',
            'introduction.max' => '简介不能超过 200 个字符',
        ];
    }
}
