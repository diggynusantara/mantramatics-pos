<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Data User</h2>
		<ol class="breadcrumb">
			<li>
				<a>Home</a>
			</li>
			<li>
				<a>Seting</a>
			</li>
			<li class="active">
				<strong>User</strong>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
	<div class="ibox float-e-margins">
		<div class="ibox-title">
			<h5>Daftar User</h5>
			<div class="ibox-tools">
				
				<a href="<?php echo base_url()?>user/add"><button class="btn btn-sm btn-primary">Tambah</button></a></li>
				
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
			<div class="table-responsive">
				
				<?=$this->session->flashdata("pesan")?>
				
				<!--PESAN ERROR UBAH PASSWORD-->
				<?= validation_errors() ?>
				<?= $this->session->flashdata('error') ?>
				
				<table class="table table-striped table-bordered table-hover dataTables-example" >
					<thead>
						<tr>
							<th style="width:10px"><center>No.</center></th>
							<th style="width:100px"><center>Username</center></th>
							<th style=""><center>Nama</center></th>
							<th style="width:150px"><center>Email</center></th>
							<th style="width:100px"><center>Level</center></th>
							<th style="width:50px"><center>Status</center></th>
							<th style="width:50px"><center>Photo</center></th>
							<th style="width:120px"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
					
						<? if(empty($query)){ ?> <!-- jika data kosong kita tampilkan pesan -->
						<tr>
							<td colspan="3">Data tidak ada</td>
						</tr>
						<? }else{ $no=0;
						foreach($query as $rowdata){ $no++; ?> <!-- menampilkan data dari query dengan looping -->
						<tr>
							<td><center><?=$no?></center></td>
							<td><?=$rowdata->username?></td>
							<td><?=$rowdata->nama?>  </td>
							<td><?=$rowdata->email?></td>
							<td><center><?php if($rowdata->level == 1) { ?> Administrator <?php } else { ?> Operator <?php } ?></center></td>
							<td><center><?php if($rowdata->is_active == 1) { ?> Active <?php } else { ?> Non-Active <?php } ?></center></td>
							<td class="feed-element"><center>
								<img src="<?php echo base_url();?>assets/img/<?=$rowdata->photo?>" class="img-circle">
							</center></td>
							<td class="tooltip-demo"><center>
							
								<a href="<?=base_url()?>user/edit/?idgbr=<?=$rowdata->username?>"><button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o fa-lg"></i></button></a>
								<a href="<?=base_url()?>user/delete/<?=$rowdata->username?>"><button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash fa-lg"></i></button></a>
								<a href="<?=base_url()?>user/resetpass/<?=$rowdata->username?>"><button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Reset Password ?"><i class="fa fa-unlock-alt fa-lg"></i></button></a>
								
							</center></td>
						</tr>
						<? }}?>
					
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>
