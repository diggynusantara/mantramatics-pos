@extends('layouts.master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
        <div class="col-lg-8">
            <h2>Checkout</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ route('order.transaksi') }}">Transaction</a>
                </li>
                <li class="active">
                    <strong>Checkout</strong>
                </li>
            </ol>
        </div>
        {{-- <div class="col-sm-4">
            <div class="title-action">
                <a href="{{ route('users.create') }}" class="btn btn-outline btn-primary"><b>Add New Users</b></a>
            </div>
        </div> --}}
    </div>

    <section class="content" id="dw">
    <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

    <div class="col-lg-7">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Data Customer</h5>
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

                <div v-if="message" class="alert alert-success">
                    Transaksi telah disimpan, Invoice: <strong>#@{{ message }}</strong>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email"
                        v-model="customer.email"
                        class="form-control"
                        @keyup.enter.prevent="searchCustomer"
                        required
                        >
                    <p><strong>Tekan enter untuk mengecek email.</strong></p>
                </div>

                <div v-if="formCustomer">
                    <div class="form-group">
                        <label for="">Nama Pelanggan</label>
                        <input type="text" name="name"
                            v-model="customer.name"
                            :disabled="resultStatus"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="address"
                            class="form-control"
                            :disabled="resultStatus"
                            v-model="customer.address"
                            cols="5" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">No Telp</label>
                        <input type="text" name="phone"
                            v-model="customer.phone"
                            :disabled="resultStatus"
                            class="form-control" required>
                    </div>
                </div>

                {{-- @slot('footer') --}}
                <div class="card-footer text-muted">
                    <div v-if="errorMessage" class="alert alert-danger">
                        @{{ errorMessage }}
                    </div>
                    <button class="btn btn-primary btn-sm float-right btn-outline"
                        :disabled="submitForm"
                        @click.prevent="sendOrder">
                        <b>@{{ submitForm ? 'Loading...':'Order Now' }}</b>
                    </button>
                </div>
                {{-- @endslot --}}

            </div>
      </div>
    </div>

    @include('orders.cart')

    </div>
    </div>
    </section>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
    <script src="{{ asset('js/transaksi.js') }}"></script>
@endsection
