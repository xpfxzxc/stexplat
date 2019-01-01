@extends('layouts.app')
@section('title', $course->id ? '编辑课程' : '新建课程')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-body">
        <h2 class="">
          <i class="far fa-edit"></i>
          @if($course->id)
          编辑课程
          @else
          新建课程
          @endif
        </h2>

        <hr>

        @if($course->id)
          <form action="{{ route('courses.update', $course->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('courses.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
        @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @include('shared._error')

            <div class="form-group">
              <input class="form-control" type="text" name="name" value="{{ old('name', $course->name) }}" placeholder="请填写名称" required>
            </div>

            <div class="form-group">
              <input class="form-control" type="text" name="instructor" value="{{ old('instructor', $course->instructor) }}" placeholder="请填写讲师名字" required>
            </div>

            <div class="form-group">
              <textarea name="body" class="form-control" id="editor" rows="6" placeholder="请至少填入两百个字符对课程进行详细描述。" required>{{ old('body', $course->body) }}</textarea>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col">开始日期
                  <input type="date" name="start_at" class="form-control-date" value="{{ old('start_at', $course->start_at) }}">
                </div>
                <div class="col">结束日期
                  <input type="date" name="end_at" class="form-control-date" value="{{ old('end_at', $course->end_at) }}">
                </div>
              </div>
            </div>

             <div class="form-group">
                <label>横幅
                  <input type="file" name="banner" class="form-control-file">
                </label>
                <small>不小于尺寸208×208，只允许 jpeg, bmp, png, gif 格式</small>
              @if($course->id)
                <larger class="form-text text-muted">由于安全原因，请重新上传横幅</larger>
              @endif
            </div>

            <div class="well well-sm">
              <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i>
              @if($course->id)
                保存
              @else
                新建
              @endif
              </button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
  <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

  <script>
    $(document).ready(function() {
      var editor = new Simditor({
        textarea: $('#editor'),
        upload: {
          url: '{{ route('courses.upload_image') }}',
          params: {
            _token: '{{ csrf_token() }}'
          },
          fileKey: 'upload_file',
          connectionCount: 3,
          leaveConfirm: '文件上传中，关闭此页面将取消上传。'
        },
        pasteImage: true,
      });
    });
  </script>
@stop
