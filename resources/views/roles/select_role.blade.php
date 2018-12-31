@extends('layouts.app')
@section('title', '选择身份')

@section('content')
  @if ($type === 'college')
    @include('roles._college_form')
  @else
    @include('roles._student_form')
  @endif
@stop
