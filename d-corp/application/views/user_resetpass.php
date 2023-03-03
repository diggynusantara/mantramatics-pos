<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Reset Password User</h2>
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
			<li>
				<a>Edit</a>
			</li>
			<li class="active">
				<strong>Reset Password</strong>
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
				<!--PESAN ERROR UBAH PASSWORD-->
					<?= validation_errors() ?>
					<?= $this->session->flashdata('error') ?>
					
				<form action="<?=base_url()?>user/save_resetpass" method="post" enctype="multipart/form-data" class="form-horizontal">
				
				<?php echo form_hidden('id',$this->uri->segment(3)); ?>
				
				<div class="form-group">
					<label class="col-lg-2 control-label">Password Baru</label>
					<div class="col-sm-5">
						<input type="password" id="new" name="new" value="<?php echo set_value('new');?>" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Ulangi Password</label>
					<div class="col-sm-5">
						<input type="password" id="re_new" name="re_new" value="<?php echo set_value('re_new'); ?>" required="required" class="form-control">
					</div>
				</div>
				
				<br/>
				
				<div class="form-group">
					<label class="col-lg-2 control-label">&nbsp;</label>
					<div class="col-sm-5">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-danger" onclick="history.back()">Batal</button>
					</div>
				</div>
				<br/>
				<hr/>
				
				</form>
				
			</div>
		</div>
	</div>
</div>
</div>
