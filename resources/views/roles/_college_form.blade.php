<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">完善院校信息</div>

        <div class="card-body">
          <form method="POST" action="{{ route('colleges.store') }}" accept-charset="UTF-8"
          enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
              <label for="badge" class="col-md-4 col-form-label text-md-right">校徽</label>

              <div class="col-md-6">
                <input type="file" name="badge" class="form-control-file">

                <small>不小于尺寸208×208，只允许 jpeg, bmp, png, gif 格式</small>

                @if ($errors->has('badge'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('badge') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="region" class="col-md-4 col-form-label text-md-right">地区</label>

              <div class="col-md-6">
                <input id="region" type="text" class="form-control{{ $errors->has('region') ? ' is-invalid' : '' }}" name="region" value="{{ old('region') }}" required>

                @if ($errors->has('region'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('region') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="address" class="col-md-4 col-form-label text-md-right">地址</label>

              <div class="col-md-6">
                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                @if ($errors->has('address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="tel" class="col-md-4 col-form-label text-md-right">联系电话</label>

              <div class="col-md-6">
                <input id="tel" type="text" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" required>

                @if ($errors->has('tel'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tel') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="introduction" class="col-md-4 col-form-label text-md-right">简介</label>

              <div class="col-md-6">
                <textarea id="introduction" class="form-control{{ $errors->has('introduction') ? ' is-invalid' : '' }}" name="introduction" rows="3" required>{{ old('introduction') }}</textarea>

                @if ($errors->has('introduction'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('introduction') }}</strong>
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
              <p>不是院校？ ·
                <a href="{{ route(Route::currentRouteName()) }}?type=student">我是学生</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
