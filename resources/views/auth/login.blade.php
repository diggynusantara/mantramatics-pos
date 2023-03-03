@extends('layouts.auth')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
  <div>

    <div>
      <h1 class="logo-name">G+</h1>
    </div>

    <h3>Goodlooking POS</h3>

    {{-- PESAN ALERTS --}}
    @include('layouts/alert')

    {{-- <form class="m-t" method="post" action="{!! route('home') !!}"> --}}
    <form class="m-t" method="post" action="{!! route('login') !!}">

      {{ csrf_field() }}

      <div class="form-group">
        <input type="text" name="username" value="{{ old('username') }}" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username" required>
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
        <input type="password" name="password" value="" class="form-control" placeholder="Password" required>
        {{-- <p>
              @if ($errors->has('password'))
                <div class="alert alert-danger alert-dismissable">
  								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  								{{ $errors->first('password') }}<a class="alert-link"></a>.
      </div>
      @endif
      </p> --}}
  </div>

  <button type="submit" name="btnSubmit" value="Login" class="btn btn-success block full-width m-b">Login</button>

  <div>
    <center>
      <a href="forgotpass">Lost Password ? &nbsp; &nbsp;</a>
      <a href="register" class="to_register">&nbsp; &nbsp; Create Account</a>
    </center>
  </div>

  </form>

  <h3><small>© 2020 Goodlookingsoft</small></h3>

</div>
</div>
@endsection