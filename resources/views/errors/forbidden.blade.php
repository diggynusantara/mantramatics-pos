{{-- Memanggil Template --}}
@extends('layouts/master')

{{-- Isi Page-nya --}}
@section('content')

  <div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    	<div class="col-lg-8">
      		<h2>Access Forbidden</h2>
          <ol class="breadcrumb">
        			<li>
      				    <a href="/home">Home</a>
        			</li>
        			<li class="active">
      				    <strong>Forbidden</strong>
        			</li>
          </ol>
      </div>
      {{-- <div class="col-sm-4">
          <div class="title-action">
              <a href="/post" class="btn btn-outline btn-primary">Back to Home</a>
          </div>
      </div> --}}
  </div>


  <div class="col-md-3"></div>
  <div class="col-md-6 text-center animated flash">

      <br><br><br><br><br><br><br><br>
      <h2>@include('flash::message')</h2>

  </div>
  <div class="col-md-3"></div>


  <div class="col-md-4"></div>
  <div class="col-md-4 text-center animated bounceIn">
      <a href="/home" class="btn btn-outline btn-warning m-t"><b>Dashboard</b></a>
  </div>
  <div class="col-md-4"></div>

@endsection
