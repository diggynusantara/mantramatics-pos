<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Input Data User</h2>
		<ol class="breadcrumb">
			<li>
				<a>Home</a>
			</li>
			<li>
				<a>Setting</a>
			</li>
			<li>
				<a>User</a>
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
					<a href="<?php echo base_url()?>user"><button class="btn btn-sm btn-success">Daftar User</button></a></li>
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
				
				<?=$this->session->flashdata('pesan')?>
			
				<form action="<?php echo base_url() ?>user/insert" method="post" enctype="multipart/form-data" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-lg-2 control-label">Username</label>
					<div class="col-sm-5">
						<input type="text" name="username" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Nama</label>
					<div class="col-sm-5">
						<input type="text" name="nama" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Email</label>
					<div class="col-sm-5">
						<input type="text" name="email" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Password</label>
					<div class="col-sm-5">
						<input type="password" name="password" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Level</label>
					<div class="col-sm-5">
						<select name="level" class="form-control" required="required" >
							<option value="1" class="form-control">Administrator</option>
							<option value="2" class="form-control">Operator</option>
						</select>
					</div>		
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Status</label>
					<div class="col-sm-5">
						<select name="is_active" class="form-control" required="required" >
							<option value="1" class="form-control">Active</option>
						</select>
					</div>		
				</div>
				<!--<div class="form-group">
					<label class="col-lg-2 control-label">Level</label>
					<div class="col-sm-5">
						<input type="text" name="level" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Status</label>
					<div class="col-sm-5">
						<input type="text" name="is_active" required="required" class="form-control">
					</div>
				</div>-->
				<div class="form-group">
					<label class="col-lg-2 control-label">Photo</label>
					<div class="col-sm-5">
						<input type="file" name="filefoto" required="required" class="form-control">
					</div>
				</div>
				
				<br/>
				
				<div class="form-group">
					<label class="col-lg-2 control-label">&nbsp;</label>
					<div class="col-sm-5">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>

				</form>
				
			</div>
		</div>
	</div>
</div>
</div>
