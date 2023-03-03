@extends('layouts.auth')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
      <div>

        <div>
          <h1 class="logo-name">M+</h1>
        </div>

        <h2>Register Success</h2>

        <div><br/>

            <h3>But you don't have role and permissions and you cannot login, please contact Administrator or wait for the Administrator to verify your account</h3>

            <h4>Email : admin@mantramatics.io</h4>

            <a href="/login"><button type="submit" class="btn btn-primary block full-width m-b">Login</button></a>

        </div>

        <h3><small>© 2019 Mantramatics Inc.</small></h3>

      </div>
    </div>
@endsection
