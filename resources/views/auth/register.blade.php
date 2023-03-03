@extends('layouts.auth')

@section('content')
    <div class="middle-box text-center loginscreen   animated fadeInDown">
      <div>

        <div>
          <h1 class="logo-name">G+</h1>
        </div>

        <h3>Register to Goodloo'kingsoft (POS)</h3>

        <form class="m-t" method="POST" action="{!! route('register') !!}">

          {{ csrf_field() }}

          <div class="form-group">
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="{{ __('Name') }}" required autofocus>
            <p>
              @if ($errors->has('name'))
                <div class="alert alert-danger alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					{{ $errors->first('name') }}<a class="alert-link"></a>.
				</div>
              @endif
            </p>
          </div>

          <div class="form-group">
            <input type="text" name="username" id="inputUsername" value="{{ old('username') }}" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" placeholder="{{ __('Username') }}" required>
            <p>
              @if ($errors->has('username'))
                <div class="alert alert-danger alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					{{ $errors->first('username') }}<a class="alert-link"></a>.
				</div>
              @endif
            </p>
          </div>

          <div class="form-group">
            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="{{ __('Email') }}" required>
            <p>
              @if ($errors->has('email'))
                <div class="alert alert-danger alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					{{ $errors->first('email') }}<a class="alert-link"></a>.
				</div>
              @endif
            </p>
          </div>

          <div class="form-group">
            <input type="password" name="password" id="password" value="" class="form-control" placeholder="{{ __('Password') }}" required>
          </div>

          <div class="form-group">
            <input type="password" name="password_confirmation" id="password-confirm" value="" class="form-control " placeholder="{{ __('Password Confirmation') }}" required>
          </div>

          <div class="form-group {{ $errors->has('password') ? 'is-invalid' : '' }}">
            <p>
              @if ($errors->has('password'))
                <div class="alert alert-danger alert-dismissable">
					<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
					{{ $errors->first('password') }}<a class="alert-link"></a>.
				</div>
              @endif
            </p>
          </div>

          <button type="submit" name="btnSubmit" value="Daftar" class="btn btn-primary block full-width m-b">{{ __('Register') }}</button>

          <div>
            <p class="change_link">Already a member ?
            <a href="{!! route('login') !!}" class="to_register"> Log In </a>
          </div>

        </form>
        <h3><small>© 2020 Goodloo'kingsoft</small></h3>

      </div>
    </div>
@endsection
