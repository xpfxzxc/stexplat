@extends('layouts.app')

@section('title', '我的通知')

@section('content')
  <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">

        <div class="card-body">

          <h3 class="text-xs-center">
            <i class="far fa-bell" aria-hidden="true"></i> 我的通知
          </h3>
          <hr>

          @if ($registers->count())
            <ul class="list-group">
              @foreach ($registers as $register)
              <li class="list-group-item pl-2 pr-2 border-right-0 border-left-0 @if($loop->first) border-top-0 @endif">
                <div>
                  <small>{{ $register->created_at->diffForHumans() }}</small>
                  {{ $register->data->student_name }} 向
                  <a href="{{ route('colleges.show', $register->college_id) }}">{{ $register->data->college_name }}</a> 申请
                  <a href="{{ route('courses.show', $register->course_id) }}">{{ $register->data->course_name }}</a> 课程
                </div>
                <div class="text-muted">
                  学生专业：{{ $register->data->student_major }}
                  就读院校：{{ $register->data->student_college }}
                  学生年级：{{ $register->data->student_grade }}
                  手机号码：{{ $register->data->student_cell_phone }}
                </div>
                @if (Auth::user()->hasRole('College') && $register->status === '申请中')
                  <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('您确定要拒绝吗？');">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger float-right @if($register->status !== '申请中') disabled @endif">拒绝</button>
                  </form>
                  <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('您确定要通过吗？');">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary float-right @if($register->status !== '申请中') disabled @endif">通过</button>
                  </form>
                @else
                  <p class="text-right pr-3">[{{ $register->status }}]</p>
                @endif
              </li>
              @endforeach
            </ul>

              {!! $registers->render() !!}

          @else
            <div class="empty-block">没有消息通知！</div>
          @endif

        </div>
      </div>
    </div>
  </div>
@stop
