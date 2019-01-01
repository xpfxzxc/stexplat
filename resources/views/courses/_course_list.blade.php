@if (count($courses))
  <ul class="list-unstyled">
    @foreach ($courses as $course)
      <li class="media">
        <div class="align-self-start">
          <a href="{{ route('courses.show', [$course->id]) }}">
            <img class="media-object img-thumbnail mr-3" style="width: 104px; height: 104px;" src="{{ $course->banner }}" title="{{ $course->name }}">
          </a>
        </div>

        <div class="media-body">
          <div class="media-heading mt-0 mb-1">
            <a href="{{ route('courses.show', [$course->id]) }}" title="">
              {{ $course->name }}
            </a>
            <a class="float-right" href="{{ route('courses.show', [$course->id]) }}">
              <span class="badge badge-secondary badge-pill"> {{ $course->register_count }} </span>
            </a>
          </div>

          <small class="media-body meta text-secondary">
            <a class="text-secondary" href="#" title="院校">
              <i class="fas fa-university"></i>
              {{ $course->college->user->name }}
            </a>

            <span> · </span>
            <a class="text-secondary" href="#" title="授课人">
              <i class="fas fa-chalkboard-teacher"></i>
              {{ $course->instructor }}
            </a>

            <span> · </span>
            <a class="text-secondary" href="#" title="日期">
              <i class="fas fa-clock"></i>
              {{ $course->start_at }} ~ {{ $course->end_at }}
            </a>
            <p class="text-dark">{{ $course->excerpt }}</p>
          </small>
        </div>
      </li>

      @if ( ! $loop->last)
        <hr>
      @endif
    @endforeach
  </ul>

@else
  <div class="empty-block">暂无课程 </div>
@endif
