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
    <div class="card ">
      <div class="card-body">
        暂无发布课程
      </div>
    </div>

  </div>
</div>
@stop
