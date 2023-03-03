@extends('layouts.master')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
        <div class="col-lg-8">
            <h2>Transaction</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="active">
                    <strong>Transaction</strong>
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
                <h5>Transaction List</h5>
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
                <div class="row">

                    <div class="col-sm-4 b-r">
                        <!-- SUBMIT DIJALANKAN KETIKA TOMBOL DITEKAN -->
                        <form action="#" @submit.prevent="addToCart" method="post">
                            <div class="form-group">
                                <label for="">Produk</label>
                                <select name="product_id" id="product_id"
                                    v-model="cart.product_id"
                                    class="form-control" required width="100%">
                                    <option value="">Pilih</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->code }} - {{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Qty</label>
                                <input type="number" name="qty"
                                    v-model="cart.qty"
                                    id="qty" value="1"
                                    min="1" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-outline btn-primary" :disabled="submitCart">
                                    <i class="fa fa-shopping-cart"></i><b> @{{ submitCart ? 'Loading...':'&nbsp;To Cart' }}</b>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-4">
                        <h4>Detail Product</h4>
                        <div v-if="product.name">
                            <table class="table table-stripped">
                                <tr>
                                    <th>Code</th>
                                    <td>:</td>
                                    <td>@{{ product.code }}</td>
                                </tr>
                                <tr>
                                    <th width="3%">Product</th>
                                    <td width="2%">:</td>
                                    <td>@{{ product.name }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>:</td>
                                    <td>@{{ product.price | currency }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-4" v-if="product.photo">
                        <img class="img-rounded" :src="'/uploads/product/' + product.photo" height="175px" width="175px" :alt="product.name">
                    </div>

                </div>
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
