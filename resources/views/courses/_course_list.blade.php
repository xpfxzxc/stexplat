@if (count($courses))
  <ul class="list-unstyled">
    @foreach ($courses as $course)
      <li class="media">
        <div class="align-self-start">
          <a href="{{ route('courses.show', [$course->id]) }}">
            <img class="media-object img-thumbnail mr-3" style="width: 104px; height: 104px;" src="{{ $course->banner }}" title="">
          </a>
        </div>

        <div class="media-body">
          <div class="media-heading mt-0 mb-1">
            <a href="{{ route('courses.show', [$course->id]) }}" title="">
              {{ $course->name }}
            </a>
          </div>

          <small class="media-body meta text-secondary">

            {{ $course->excerpt }}
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
