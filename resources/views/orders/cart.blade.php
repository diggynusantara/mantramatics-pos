
<div class="col-md-5">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Cart List</h5>
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
                            <th>Product</th>
                            <th>Price</th>
                            <th><center>Qty</center></th>
                            <th><center>Action</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in shoppingCart">
                            <td>@{{ row.name }} (@{{ row.code }})</td>
                            <td>@{{ row.price | currency }}</td>
                            <td><center>@{{ row.qty }}</center></td>
                            <td>
                                <center><button
                                    @click.prevent="removeCart(index)"
                                    class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button></center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- @slot('footer') --}}
            <div class="card-footer text-muted">
                @if (url()->current() == route('order.transaksi'))
                <a href="{{ route('order.checkout') }}"
                    class="btn btn-info btn-sm float-right btn-outline"><b>Checkout</b>
                </a>
                @else
                <a href="{{ route('order.transaksi') }}"
                    class="btn btn-warning btn-sm float-right btn-outline"><b>Cancel</b>
                </a>
                @endif
            </div>
            {{-- @endslot --}}

        </div>
    </div>
</div>
