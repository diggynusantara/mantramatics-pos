@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    <div class="col-lg-8">
        <h2>Change Role</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
                <a href="{!! route('users.index') !!}">Users Manajement</a>
            </li>
            <li class="active">
                <strong>Change Role</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-4">
        <div class="title-action">
            <a href="{{ route('users.index') }}" class="btn btn-outline btn-primary"><b>Back to Users List</b></a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-12">
        {{-- PESAN ALERTS --}}
        @include('layouts/alert')
    </div>

    <div class="col-lg-5">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Information Role & Permissions</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width:100px">&nbsp;</th>
                                <th style="width:10px">&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td><b>{{ $user->name }}</b></td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>:</td>
                                <td>
                                    @foreach ($roles as $row)
                                    <div class="i-checks">
                                        <label><input type="checkbox" name="role"
                                            {{ $user->hasRole($row) ? 'checked':'' }}
                                            value="{{ $row }}" disabled> {{  $row }}
                                        </label>
                                    </div>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Permissions</th>
                                <td>:</td>
                                <td>
                                    @foreach ($permissions as $row)
                                    <div class="i-checks">
                                        <label><input type="checkbox" name="role"
                                            {{ $user->hasAnyPermission($row) ? 'checked':'' }}
                                            value="{{ $row }}" disabled> {{  $row }}
                                        </label>
                                    </div>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Form Change Role</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <form role="form" action="{!! route('users.set_role', $user->id) !!}" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    {{-- <input type="hidden" name="_method" value="PUT"> --}}

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:100px">&nbsp;</th>
                                    <th style="width:10px">&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>:</td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                    </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>:</td>
                                    <td>
                                        @foreach ($roles as $row)
                                        <div class="i-checks">
                                            <label><input type="radio" name="role"
                                                {{ $user->hasRole($row) ? 'checked':'' }}
                                                value="{{ $row }}"> {{  $row }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <div class="pull-right">
                                <button class="btn btn-outline btn-primary" type="submit"><b>Change Role</b></button>
                                <a href="{!! route('users.index') !!}" class="btn btn-outline btn-warning"><b>Cancel</b></a>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>


</div>
</div>
@endsection
