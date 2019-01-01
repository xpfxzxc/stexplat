@extends('layouts.app')

@section('title', '课程列表')

@section('content')

<div class="row mb-5">
  <div class="col-lg-9 col-md-9">
    <div class="card">

      <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
          <li class="nav-item">

            <a class="nav-link " href="{{ Request::url() }}?order=name">
              全部
            </a>
          </li>
          <li class="nav-item">

            <a class="nav-link" href="{{ Request::url() }}?order=region">
              未开始
            </a>
          </li>
        </ul>
      </div>

      <div class="card-body">
        {{-- 课程列表 --}}
        @include('courses._course_list', ['courses' => $courses])
        {{-- 分页 --}}
        <div class="mt-5">
          {!! $courses->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
