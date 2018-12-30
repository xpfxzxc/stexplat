@extends('layouts.app')
@section('title', '选择身份')

@section('content')
  @if ($type === 'college')
    <p>院校表单</p>
  @elseif ($type === 'institution')
    <p>评估机构表单</p>
  @else
    <p>学生表单</p>
  @endif
@stop
