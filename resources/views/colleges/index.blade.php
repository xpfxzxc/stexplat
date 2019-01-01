@extends('layouts.app')

@section('title', '院校列表')

@section('content')

<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    <div class="alert alert-info" role="alert">
      院校列表：选院校，申请课程
    </div>
    <div class="card">
      <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
          <li class="nav-item">

            <a class="nav-link " href="{{ Request::url() }}?order=name">
              名称排序
            </a>
          </li>
          <li class="nav-item">

            <a class="nav-link" href="{{ Request::url() }}?order=region">
              地区排序
            </a>
          </li>
        </ul>
      </div>

      <div class="card-body">
        {{-- 院校列表 --}}
        @include('colleges._college_list', ['colleges' => $colleges])
        {{-- 分页 --}}
        <div class="mt-5">
          {!! $colleges->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
