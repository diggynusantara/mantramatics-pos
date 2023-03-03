<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Profile Info</h2>
		<ol class="breadcrumb">
			<li>
				<a>Dashboard</a>
			</li>
			<li>
				<a>Setting</a>
			</li>
			<li class="active">
				<strong>Profile</strong>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content">
	<div class="row animated fadeInRight">
	
		<div class="col-md-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Photo Profile</h5>
				</div>
				<div>
					<div class="ibox-content no-padding border-left-right">
					<center>
						<img alt="image" class="img-responsive" src="<?php echo base_url().'assets/img/'.$this->session->userdata('photo');?>">
					</center>
					</div>
					<div class="ibox-content profile-content">
						<h4><strong><?php echo $this->session->userdata('nama'); ?></strong></h4>
						<p><?php if($this->session->userdata('level') == 1) { ?> (Administrator) <?php } else { ?> (Operator) <?php } ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Profile Detail</h5>
					<div class="ibox-tools">
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
				
					<!--PESAN ERROR EDIT PROFILE-->
					<?=$this->session->flashdata("pesan")?>
					
					<!--PESAN ERROR UBAH PASSWORD-->
					<?= validation_errors() ?>
					<?= $this->session->flashdata('error') ?>
				
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
						  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal Info</a>
						  </li>
						  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Edit Profile</a>
						  </li>
						  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Ubah Password</a>
						  </li>
						</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
							<div class="animated fadeInRight">
								<table class="table table-striped">
									<thead>
										<tr>
											<th style="width:100px">&nbsp;</th>
											<th style="width:10px">&nbsp;</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
									<tr>
										<td>Username</td>
										<td>:</td>
										<td><?php echo $this->session->userdata('username'); ?></td>
									</tr>
									<tr>
										<td>Nama</td>
										<td>:</td>
										<td><?php echo $this->session->userdata('nama'); ?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td>:</td>
										<td><?php echo $this->session->userdata('email'); ?></td>
									</tr>
									<!--<tr>
										<td>No. HP</td>
										<td>:</td>
										<td></td>
									</tr>
									<tr>
										<td>Level</td>
										<td>:</td>
										<td><?php if($this->session->userdata('level') == 1) { ?> Administrator <?php } else { ?> Operator <?php } ?></td>
									</tr>-->
									</tbody>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
							<div class="animated fadeInRight">
								<form action="<?=base_url()?>profile/edit" method="post" enctype="multipart/form-data" id="" data-parsley-validate class="form-horizontal form-label-left">
										
								<div class="form-group"><br />
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="username" value="<?php echo $this->session->userdata('username'); ?>" required="required" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="nama" value="<?php echo $this->session->userdata('nama'); ?>" required="required" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="email" value="<?php echo $this->session->userdata('email'); ?>" required="required" class="form-control">
									</div>
								</div>
								<!--<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No. HP
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" name="" value="" required="required" class="form-control">
									</div>
								</div>-->
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">File Foto
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="file" name="filefoto" class="form-control">
										<!-- file gambar kita buat pada field hidden -->
										<input type="hidden" name="filelama" class="form-control" value="<?php echo $this->session->userdata('photo'); ?>">
										<!-- Id gambar kita hidden pada input field dimana berfungsi sebagai identitas yang dibawa untuk update -->
										<input type="hidden" name="kode" class="form-control" value="<?php echo $this->session->userdata('username'); ?>">
										<p>Kosongkan bila fle foto tidak diubah</p>									</div>
								</div> 
								
								<div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									  <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
									</div>
								</div>
								
								</form>
							</div>
						</div>
				  
						<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
							<div class="animated fadeInRight">
							<form action="<?=base_url()?>profile/save_password" method="post" enctype="multipart/form-data" id="" data-parsley-validate class="form-horizontal form-label-left">
				
							<div class="form-group"><br />
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password Lama
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
								  <input type="password" name="old" value="<?php echo set_value('old');?>" required="required" class="form-control">
								</div>
							</div>
							  
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password Baru
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
								  <input type="password" name="new" value="<?php echo set_value('new');?>" required="required" class="form-control">
								</div>
							</div>
							  
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ulangi Password
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
								  <input type="password" name="re_new" value="<?php echo set_value('re_new'); ?>" required="required" class="form-control">
								</div>
							</div>
							  
							<br />
							  
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								  <button type="submit" class="btn btn-primary" value="">Simpan</button>
								</div>
							</div>
							
							</form>
							</div>
							
						</div>
						
					</div>
					
					<hr style="clear:both;"/>
					
					</div>
					
				</div>
			</div>
		</div>
		
	</div>
</div>

