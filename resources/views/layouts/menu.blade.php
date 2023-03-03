<ul class="nav metismenu" id="side-menu">
    <li class="nav-header">
        <div class="dropdown profile-element">
            <span>
                {{-- <img alt="image" class="img-circle" src="{{ asset('assets/img/profile_small.jpg') }}" /> --}}
                @if (!empty( Auth::user()->photo ))
                    <img src="{{ asset('uploads/users/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" width="50px" height="50px" class="img-circle">
                @else
                    <img src="http://via.placeholder.com/50x50" alt="&nbsp;No Data Photo" class="img-circle">
                @endif
            </span>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                </span> <span class="text-muted text-xs block">
                  @role('admin') Administrator @endrole
                  @role('user') User @endrole
                  @role('operator') Operator @endrole
                  @role('cashier') Cashier @endrole
                  <b class="caret"></b></span>
                </span>
            </a>
            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                <li><a href="profile">Profile</a></li>
                {{-- <li><a href="contacts">Contacts</a></li> --}}
                <li class="divider"></li>
                <li>
                    <a href="{!! route('logout') !!}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
        <div class="logo-element">
            M+
        </div>
    </li>

    @role('admin|operator|cashier')
    {{-- <li class="active"> --}}
    <li class="{{ (request()->is('home*')) ? 'active' : '' }}">
        <a href="/home"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
    </li>
    @else
    <li>
        <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
    </li>
    @endrole

    @can ('transactions')
    <li class="{{ (request()->is('transaksi*')) ? 'active' : '' }} {{ (request()->is('checkout*')) ? 'active' : '' }}">
        <a href="{!! route('order.transaksi') !!}"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Transaction</span></a>
    </li>

    <li class="{{ (request()->is('order*')) ? 'active' : '' }}">
        <a href="{!! route('order.index') !!}"><i class="fa fa-suitcase"></i> <span class="nav-label">Orders</span></a>
    </li>
    @endcan

    @can ('show products', 'create products', 'delete products')
    <li class="{{ (request()->is('produk*')) ? 'active' : '' }} {{ (request()->is('kategori*')) ? 'active' : '' }}">
        <a href="#"><i class="fa fa-archive"></i> <span class="nav-label">Product Manajement</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li class="{{ (request()->is('produk*')) ? 'active' : '' }}">
                <a href="{!! route('produk.index') !!}">Products</a>
            </li>
            <li class="{{ (request()->is('kategori*')) ? 'active' : '' }}">
                <a href="{!! route('kategori.index') !!}">Categories</a>
            </li>
        </ul>
    </li>
    @endcan

    @role('admin')
    <li class="{{ (request()->is('role*')) ? 'active' : '' }} {{ (request()->is('users*')) ? 'active' : '' }} {{ (request()->is('rolperm*')) ? 'active' : '' }}">
        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">User Manajement</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li class="{{ (request()->is('role*')) ? 'active' : '' }}">
                <a href="{!! route('role.index') !!}">Role</a>
            </li>
            <li class="{{ (request()->is('rolperm*')) ? 'active' : '' }}">
                <a href="{!! route('users.roles_permission') !!}">Role Permission</a>
            </li>
            <li class="{{ (request()->is('users*')) ? 'active' : '' }}">
                <a href="{!! route('users.index') !!}">Users</a>
            </li>
        </ul>
    </li>
    @endrole

    @role('admin|operator|cashier')
    <li class="{{ (request()->is('profile*')) ? 'active' : '' }}">
        <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Setting</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse">
            <li class="{{ (request()->is('profile*')) ? 'active' : '' }}"><a href="{!! route('profile.index') !!}">Profile</a></li>
            {{-- <li class="{{ (request()->is('profile*')) ? 'active' : '' }}"><a href="">Profile</a></li> --}}
        </ul>
    </li>
    @endrole

</ul>
