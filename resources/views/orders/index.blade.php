@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker-bs3.css') }}">
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
        <div class="col-lg-8">
             <h2>Orders</h2>
             <ol class="breadcrumb">
                <li>
                    <a href="{!! route('home') !!}">Home</a>
                </li>
                <li class="active">
                    <strong>Orders</strong>
                </li>
            </ol>
        </div>
        {{-- <div class="col-sm-4">
            <div class="title-action">
                <a href="{!! route('home') !!}" class="btn btn-outline btn-primary">Home</a>
            </div>
        </div> --}}
    </div>

        <section class="content" id="dw">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Items Sold</h5>
                                {{-- <a href=""><span class="label label-primary pull-right">See Details</a></span></a> --}}
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
                                <h1 class="no-margins text-center text-navy"><b>{{ $sold }}</b></h1>
                                {{-- <small class="font-bold">Total customers</small> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Total Omset</h5>
                                {{-- <a href=""><span class="label label-primary pull-right">See Details</a></span></a> --}}
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
                                <h1 class="no-margins text-center text-navy"><b>Rp {{ number_format($total) }}</b></h1>
                                {{-- <small class="font-bold">Total customers</small> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Total Customer</h5>
                                {{-- <a href=""><span class="label label-primary pull-right">See Details</a></span></a> --}}
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
                                <h1 class="no-margins text-center text-navy"><b>{{ $total_customer }}</b></h1>
                                {{-- <small class="font-bold">Total customers</small> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Filter Transaction</h5>
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

                                <form action="{{ route('order.index') }}" method="get">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Start Date</label>
                                                <input type="text" name="start_date" class="form-control
                                                    {{ $errors->has('start_date') ? 'is-invalid':'' }}"
                                                    id="start_date"
                                                    value="{{ request()->get('start_date') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">End Date</label>
                                                <input type="text" name="end_date"class="form-control
                                                    {{ $errors->has('end_date') ? 'is-invalid':'' }}"
                                                    id="end_date"
                                                    value="{{ request()->get('end_date') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Customer</label>
                                                <select name="customer_id" class="form-control">
                                                    <option value="">Pilih</option>
                                                    @foreach ($customers as $cust)
                                                    <option value="{{ $cust->id }}"
                                                        {{ request()->get('customer_id') == $cust->id ? 'selected':'' }}>
                                                        {{ $cust->name }} - {{ $cust->email }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Cashier</label>
                                                <select name="user_id" class="form-control">
                                                    <option value="">Pilih</option>
                                                    @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ request()->get('user_id') == $user->id ? 'selected':'' }}>
                                                        {{ $user->name }} - {{ $user->email }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <button class="btn btn-primary btn-outline btn-sm pull-right"><b>Seach</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Customer List</h5>
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
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th><center>Invoice</center></th>
                                                <th><center>Customer</center></th>
                                                <th><center>No Telp</center></th>
                                                <th><center>Total Shopping</center></th>
                                                <th><center>Cashier</center></th>
                                                <th><center>Transaction Date</center></th>
                                                <th><center>Action</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $row)
                                            <tr>
                                                <td><center><strong>#{{ $row->invoice }}</strong></center></td>
                                                <td>{{ $row->customer->name }}</td>
                                                <td>{{ $row->customer->phone }}</td>
                                                <td>Rp {{ number_format($row->total) }}</td>
                                                <td>{{ $row->user->name }}</td>
                                                <td><center>{{ $row->created_at->format('d-m-Y H:i:s') }}</center></td>
                                                <td><center>
                                                    <a href='{{ route('order.pdf', $row->invoice) }}'>
                                                        <button type='button' target="_blank" class='btn btn-xs btn-outline btn-primary' data-toggle='tooltip' data-placement='top' title='Export to PDF'><i class='fa fa-file-pdf-o fa-lg'></i></button>
                                                    </a>

                                                    <a href='{{ route('order.excel', $row->invoice) }}'>
                                                        <button type='button' target="_blank" class='btn btn-xs btn-outline btn-info' data-toggle='tooltip' data-placement='top' title='Export to Excel'><i class='fa fa-file-excel-o fa-lg'></i></button>
                                                    </a>
                                                </center></td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="text-center" colspan="7">Tidak ada data transaksi</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

@endsection

@section('js')
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script>
        $('#start_date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });

        $('#end_date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
