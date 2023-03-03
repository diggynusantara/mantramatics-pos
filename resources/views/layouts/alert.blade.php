@if (session('success'))
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <center> {{ session('success') }} </center>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <center> {{ session('info') }} </center>
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <center> {{ session('danger') }} </center>
    </div>
@endif
