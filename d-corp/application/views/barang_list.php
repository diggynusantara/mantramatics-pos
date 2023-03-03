<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Data Barang</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.html">Home</a>
			</li>
			<li>
				<a>My Project</a>
			</li>
			<li class="active">
				<strong>Barang</strong>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
<div class="col-lg-12">
	<div class="ibox float-e-margins">
		<div class="ibox-title">
			<h5>Daftar Barang</h5>
			<div class="ibox-tools">
				
				<a href="<?php echo base_url()?>barang/input"><button class="btn btn-sm btn-primary">Tambah</button></a></li>
				
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
							<th style="width:200px"><center>Kode Barang</center></th>
							<th><center>Nama Barang</center></th>
							<th style="width:150px"><center>Harga</center></th>
							<th style="width:120px"><center>Aksi</center></th>
						</tr>
					</thead>
					<tbody>
						<?=$this->session->flashdata("pesan")?>
						<?php $no=0; foreach ($barang as $b)
							{ $no++;  
							echo "<tr>
								<td><center>$no</center></td>
								<td><center>$b->kode_barang</center></td>
								<td>$b->nama_barang</td>
								<td><center>$b->harga</center></td>
								<td><center>
									<div class='tooltip-demo'>
									<a href='barang/edit/$b->kode_barang'><button type='button' class='btn btn-sm btn-info' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></button></a>
									<a href='barang/delete/$b->kode_barang'><button type='button' class='btn btn-sm btn-danger' data-toggle='tooltip' data-placement='top' title='Delete'><i class='fa fa-trash fa-lg'></i></button></a>
									</div>
								</center></td>
								</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>

