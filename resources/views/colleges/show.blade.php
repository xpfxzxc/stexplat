@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="row">

  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
    <div class="card ">
      <img class="card-img-top" src="{{ $college->badge }}" alt="{{ $user->name }}">
      <div class="card-body">
        <h5><strong>院校简介</strong></h5>
        <p>{{ $college->introduction }}</p>
        <hr>
        <p title="地区"><i class="fas fa-city"></i>&nbsp;&nbsp;{{ $college->region }}</p>
        <address title='地址'><i class="fas fa-map-marker-alt" style="font-size: 1.3em"></i>&nbsp;&nbsp;{{ $college->address }}</address>
        <p title="联系电话"><i class="fas fa-phone"></i>&nbsp;&nbsp;{{ $college->tel }}</p>
        <hr>
        <h5><strong>注册于</strong></h5>
        <p>{{ $user->created_at->diffForHumans() }}</p>
        <hr>
        <h5><strong>审核于</strong></h5>
        <p>{{ $college->updated_at->diffForHumans() }}</p>
      </div>
    </div>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="card ">
      <div class="card-body">
          <h1 class="mb-0" style="font-size:22px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
      </div>
    </div>
    <hr>

    {{-- 课程发布的内容 --}}
    @if ($courses->count())
      <h3>院校课程</h3>
      <ul class="list-group mt-4 border-8">
        @foreach ($courses as $course)
          <li class="list-group-item pl-2 pr-2 border-right-0 border-left-0 @if($loop->first) border-top-0 @endif">
            <a href="{{ route('courses.show', $course->id) }}">
              {{ $course->name }}
            </a>
            <i>发布于 {{ $course->created_at->diffForHumans() }}</i>
            <span class="meta float-right text-secondary">
              {{ $course->register_count }} 人申请
              <span> · </span>
              最后一次申请于 {{ $course->updated_at->diffForHumans() }}
            </span>
          </li>
        @endforeach
      </ul>

    @else
      <div class="empty-block">暂无发布课程</div>
    @endif

    {{-- 分页 --}}
    <div class="mt-4 pt-1">
      {!! $courses->render() !!}
    </div>


  </div>
</div>
@stop
