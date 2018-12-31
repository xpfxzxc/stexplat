<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">完善个人信息</div>

        <div class="card-body">
          <form method="POST" action="{{ route('students.store') }}">
            @csrf

            <div class="form-group row">
              <label for="college" class="col-md-4 col-form-label text-md-right">就读院校</label>

              <div class="col-md-6">
                <input id="college" type="text" class="form-control{{ $errors->has('college') ? ' is-invalid' : '' }}" name="college" value="{{ old('college') }}" required>

                @if ($errors->has('college'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('college') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="grade" class="col-md-4 col-form-label text-md-right">年级</label>

              <div class="col-md-6">
                <input id="grade" type="text" class="form-control{{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade" value="{{ old('grade') }}" required>

                @if ($errors->has('grade'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('grade') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="major" class="col-md-4 col-form-label text-md-right">专业</label>

              <div class="col-md-6">
                <input id="major" type="text" class="form-control{{ $errors->has('major') ? ' is-invalid' : '' }}" name="major" value="{{ old('major') }}" required>

                @if ($errors->has('major'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('major') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="cell_phone" class="col-md-4 col-form-label text-md-right">手机号码</label>

              <div class="col-md-6">
                <input id="cell_phone" type="text" class="form-control{{ $errors->has('cell_phone') ? ' is-invalid' : '' }}" name="cell_phone" value="{{ old('cell_phone') }}" required>

                @if ($errors->has('cell_phone'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('cell_phone') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  确定
                </button>
              </div>
            </div>

            <hr>

            <div class="col-offset-4">
              <p>不是学生？ ·
                <a href="{{ route(Route::currentRouteName()) }}?type=college">我是院校</a> ·
                <a href="{{ route(Route::currentRouteName()) }}?type=institution">我是评估机构</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
