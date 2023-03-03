<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Input Data Barang</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.html">Home</a>
			</li>
			<li>
				<a>My Project</a>
			</li>
			<li class="">
				Barang
			</li>
			<li class="active">
				<strong>Tambah</strong>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Form Input</h5>
				<div class="ibox-tools">
					<a href="<?php echo base_url()?>barang"><button class="btn btn-sm btn-success">Daftar Barang</button></a></li>
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-wrench"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#">Config option 1</a>
						</li>
						<li><a href="#">Config option 2</a>
						</li>
					</ul>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<form action="<?php echo base_url() ?>barang/input_simpan" method="post" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-lg-2 control-label">Kode Barang</label>
					<div class="col-sm-5">
						<input type="text" id="kode" name="kode" required="required" class="form-control">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-2 control-label">Nama Barang</label>
					<div class="col-sm-5">
						<input type="text" id="nama" name="nama" required="required" class="form-control">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-2 control-label">Harga Barang</label>
					<div class="col-sm-5">
						<input type="text" id="harga_barang" name="harga_barang" required="required" class="form-control">
					</div>
				</div>
				
				<br/>
				
				<div class="form-group">
					<label class="col-lg-2 control-label">&nbsp;</label>
					<div class="col-sm-5">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="submit" class="btn btn-danger" onclick="history.back()">Batal</button>
					</div>
				</div>

				</form>
				
			</div>
		</div>
	</div>
</div>
</div>
