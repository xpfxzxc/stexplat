@extends('layouts.app')

@section('title', $course->name)
@section('description', $course->excerpt)

@section('content')

<div>
  <div class="card ">
    <div class="card-body">
      <div class="text-center">
        该课程由
        <a href="{{ route('colleges.show', $course->college->id) }}">{{ $course->college->user->name }}</a>
        开放
      </div>
      <hr>
      <div class="media">
        <img class="mr-3" height="208" src="{{ $course->banner }}" alt="{{ $course->name }}">
        <div class="media-body" style="height:208px;">
          <h1>{{ $course->name }} <small><small>{{ $course->status }}</small></small></h1>
          <div class="alert alert-light pd-0 md-0" role="alert">
            <p>授课人： {{ $course->instructor }}<br>
              开课时间： {{ $course->start_at }} ~ {{ $course->end_at }}<br>
              课程发布于 {{ $course->created_at->diffForHumans() }}
            </p>
          </div>
          <button type="submit" class="btn btn-success btn-block col-md-3">申请</button>
        </div>
      </div>


      <div class="topic-body mt-4 mb-4">
        <h1>课程详情</h1>
        {!! $course->body !!}
      </div>

      <div class="operate">
        <hr>
        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-outline-secondary btn-sm" role="button">
          <i class="far fa-edit"></i> 编辑
        </a>
      </div>
    </div>
  </div>
</div>
@stop
