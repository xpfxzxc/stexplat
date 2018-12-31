@if (count($colleges))
  <ul class="list-unstyled">
    @foreach ($colleges as $college)
      <li class="media">
        <div class="align-self-start">
          <a href="{{ route('colleges.show', [$college->id]) }}">
            <img class="media-object img-thumbnail mr-3" style="width: 104px; height: 104px;" src="{{ $college->badge }}" title="">
          </a>
        </div>

        <div class="media-body">
          <div class="media-heading mt-0 mb-1">
            <a href="{{ route('colleges.show', [$college->id]) }}" title="">
              {{ $college->user->name }}
            </a>
          </div>

          <small class="media-body meta text-secondary">
            <a class="text-secondary" href="" title="地区">
              <i class="fas fa-city"></i>
              {{ $college->region }}
            </a>

            <span> · </span>
            <a class="text-secondary" href="" title="课程数量">
              <i class="fas fa-book-open"></i>
              10
            </a>

            <span> · </span>
            <a class="text-secondary" href="" title="申请人数">
              <i class="far fa-user"></i>
              10
            </a>
            <span> · </span>
            <a class="text-secondary" href="" title="正在进行人数">
              <i class="fas fa-book-reader"></i>
              10
            </a>
            <span> · </span>
            <a class="text-secondary" href="" title="完成人数">
              <i class="fas fa-graduation-cap"></i>
              10
            </a>
            <br>
            {{ $college->introduction }}
          </small>
        </div>
      </li>

      @if ( ! $loop->last)
        <hr>
      @endif
    @endforeach
  </ul>

@else
  <div class="empty-block">暂无院校 </div>
@endif
