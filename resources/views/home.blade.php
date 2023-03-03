@extends('layouts.master')

{{-- @section('title')
    <title>Dashboard</title>
@endsection --}}

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    	<div class="col-lg-8">
      	     <h2>Dashboard</h2>
             <ol class="breadcrumb">
                <li>
                	<a href="{!! route('home') !!}">Home</a>
                </li>
                <li class="active">
            	    <strong>Dashboard</strong>
                </li>
            </ol>
        </div>
        {{-- <div class="col-sm-4">
            <div class="title-action">
                <a href="{!! route('home') !!}" class="btn btn-outline btn-primary">Home</a>
            </div>
        </div> --}}
    </div>

    <!-- Main content -->
    <section class="content" id="dw">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 class="font-bold">Products</h5>
                            <a href="{!! route('produk.index') !!}"><span class="label label-primary pull-right">See Details</a></span></a>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins font-bold text-navy"><b>{{ $product }}</b></h1>
                            <small class="font-bold">Total products</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Orders</h5>
                            <a href="{!! route('order.index') !!}"><span class="label label-info pull-right">See Details</a></span></a>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins font-bold text-info"><b>{{ $order }}</b></h1>
                            <small class="font-bold">Total orders</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Customers</h5>
                            <a href="{!! route('order.index') !!}"><span class="label label-primary pull-right">See Details</a></span></a>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins text-navy"><b>{{ $customer }}</b></h1>
                            <small class="font-bold">Total customers</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Employees</h5>
                            <a href="/users"><span class="label label-info pull-right">See Details</a></span></a>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins text-info"><b>{{ $user }}</b></h1>
                            <small class="font-bold">Total employee</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Total of Sales</h5>
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
                            <canvas id="dw-chart"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection

{{-- <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Title</h5>
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



        </div>
    </div>
</div> --}}
