<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Data Gambar</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.html">Home</a>
			</li>
			<li class="active">
				<strong>Gambar</strong>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
	<div class="ibox float-e-margins">
		<div class="ibox-title">
			<h5>Daftar Gambar</h5>
			<div class="ibox-tools">
				
				<a href="<?php echo base_url()?>gambar/add"><button class="btn btn-sm btn-primary">Tambah</button></a></li>
				
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
				<table class="table table-striped table-bordered table-hover dataTables-example" >
					<thead>
						<tr>
							<th style="width:20px"><center>No.</center></th>
							<th><center>Keterangan File</center></th>
							<th><center>Tipe File</center></th>
							<th style="width:250px"><center>Gambar File</center></th>
							<th style="width:120px"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
						<? if(empty($query)){ ?> <!-- jika data kosong kita tampilkan pesan -->
						
						<tr>
							<td colspan="5"><center>Data tidak ada</center></td>
						</tr>
						
						<? }else{ $no=0; foreach($query as $b){ $no++; ?> <!-- menampilkan data dari query dengan looping -->
						
						<tr>
						  <td><center><?=$no?></center></td>
						  <td><?php echo $b->ket_gambar; ?></td>
						  <td><?php echo $b->tipe_gambar; ?></td>
						  <td><center>
						  
							  <div class="col-md-12">
								<div class="thumbnail">
								  <img style="width: 100%; display: block;" src="assets/uploads/<?php echo $b->nama_gambar; ?>" alt="image" />
									<div class="caption">
									<?=$b->nama_gambar?>
								  </div>
								</div>
							  </div>
							
						  </center></td>
						  <td><center>
							<div class="tooltip-demo">
								<!--<a href='<?=base_url()?>gambar/edit/?idgbr=<?=$b->id?>'>
								<button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o fa-lg"></i></button>
								<a/><a href='<?=base_url()?>gambar/delete/?idgbr=<?=$b->id?>'>
								<button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o fa-lg"></i></button>
								</a>-->
								<a href='<?=base_url()?>gambar/edit/?idgbr=<?=$b->id?>'>
								<button type="button" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o fa-lg"></i></button>
								<a/><a href='<?=base_url()?>gambar/delete/?idgbr=<?=$b->id?>'>
								<button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o fa-lg"></i></button>
								</a>
								
							</div>
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