@extends('layouts.master')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
    <div class="col-lg-8">
        <h2>Edit Category Product</h2>
        <ol class="breadcrumb">
            <li>
                <a href="/home">Home</a>
            </li>
            <li>
	            <a href="{!! route('kategori.index') !!}">Categories</a>
			</li>
			<li class="active">
			    <strong>Edit Category</strong>
			</li>
        </ol>
    </div>
    {{-- <div class="col-sm-4">
        <div class="title-action">
            <a href="{{ route('users.create') }}" class="btn btn-outline btn-primary"><b>Back to Category Product List</b></a>
        </div>
    </div> --}}
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">

    <div class="col-lg-4">
          <div class="ibox float-e-margins">
              <div class="ibox-title">
                  <h5>Form Edit Category Product</h5>
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

                {{-- PESAN ALERTS --}}
                @include('layouts/alert')

                @if (session('error'))
                    @alert(['type' => 'danger'])
                        {!! session('error') !!}
                    @endalert
                @endif

                <form role="form" action="{{ route('kategori.update', $categories->id) }}" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" name="name" value="{{ $categories->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                        <p>
                          @if ($errors->has('name'))
                            <div class="alert alert-danger alert-dismissable">
  								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  								{{ $errors->first('name') }}<a class="alert-link"></a>.
  							</div>
                          @endif
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}">{{ $categories->description }}</textarea>
                        <p>
                          @if ($errors->has('description'))
                            <div class="alert alert-danger alert-dismissable">
  								<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  								{{ $errors->first('description') }}<a class="alert-link"></a>.
  							</div>
                          @endif
                        </p>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline btn-primary"><b>Save</b></button>
                        <a href="{{ route('kategori.index') }}" class="btn btn-outline btn-warning"><b>Cancel</b></a>
                    </div>

                </form>

              </div>
          </div>
      </div>

</div>
</div>
@endsection
