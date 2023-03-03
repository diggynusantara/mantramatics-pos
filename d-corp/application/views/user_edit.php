<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Edit Data User</h2>
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
				<strong>Edit</strong>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Form Edit</h5>
				<div class="ibox-tools">
					<a href="<?=base_url()?>user/resetpass/<?=$row->username?>"><button class="btn btn-sm btn-danger">Reset Password ?</button></a>
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
			
				<form action="<?=base_url()?>user/update" method="post" enctype="multipart/form-data" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-lg-2 control-label">Username</label>
					<div class="col-sm-5">
						<input type="text" name="username" value="<?=$row->username?>" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Nama</label>
					<div class="col-sm-5">
						<input type="text" name="nama" value="<?=$row->nama?>" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Email</label>
					<div class="col-sm-5">
						<input type="text" name="email" value="<?=$row->email?>" required="required" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Password</label>
					<div class="col-lg-5">
						<input type="password" disabled="" value="<?=$row->password?>" class="form-control">
					</div>
                </div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Level</label>
					<div class="col-sm-5">
						<select name="level" class="form-control" required="required" >
							<?php if($row->level == 1): ?>
							<option value="1" class="form-control">
								<?php if($row->level == 1) { ?> Administrator <?php } else { ?> Operator <?php } ?>
							</option>
							<?php endif; ?>
							<?php if($row->level == 2): ?>
							<option value="2" class="form-control">
								<?php if($row->level == 2) { ?> Operator <?php } else { ?> Administrator <?php } ?>
							</option>
							<?php endif; ?>
							<?php if($row->level == 2): ?>
							<option value="1" class="form-control">Administrator</option>
							<?php endif; ?>
							<?php if($row->level == 1): ?>
							<option value="2" class="form-control">Operator</option>
							<?php endif; ?>
						</select>
					</div>		
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Status</label>
					<div class="col-sm-5">
						<select name="is_active" class="form-control" required="required" >
							<?php if($row->is_active == 1): ?>
							<option value="1" class="form-control">
								<?php if($row->is_active == 1) { ?> Active <?php } else { ?> Non-Active <?php } ?>
							</option>
							<?php endif; ?>
							<?php if($row->is_active == 2): ?>
							<option value="2" class="form-control">
								<?php if($row->is_active == 2) { ?> Non-Active <?php } else { ?> Actice <?php } ?>
							</option>
							<?php endif; ?>
							<?php if($row->is_active == 2): ?>
							<option value="1" class="form-control">Active</option>
							<?php endif; ?>
							<?php if($row->is_active == 1): ?>
							<option value="2" class="form-control">Non-Active</option>
							<?php endif; ?>
						</select>
					</div>		
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Photo</label>
					<div class="col-sm-5">
						<input type="file" name="filefoto" class="form-control">
						<!-- file gambar kita buat pada field hidden -->
						<input type="hidden" name="filelama" class="form-control" value="<?php echo $row->photo;?>">
						<!-- Id gambar kita hidden pada input field dimana berfungsi sebagai identitas yang dibawa untuk update -->
						<input type="hidden" name="kode" class="form-control" value="<?php echo $row->username;?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">&nbsp;</label>
					<div class="col-sm-5">
						<p>Kosongkan Photo bila tidak dirubah</p>
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
