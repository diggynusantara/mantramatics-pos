
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h4>&nbsp; <small>My Project / JOIN</small></h4>
		</div>

		<div class="title_right">
		<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Go!</button>
				</span>
			</div>
		</div>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>RIGHT JOIN<small>&nbsp;</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="nav navbar-right">
						<a href="#"><button class="btn btn-primary">Tambah</button></a></li>
					</div>
					<div class="clearfix"></div>
				</div>
			  
				<div class="x_content">
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					  <thead>
						<tr>
						  <th style="width:50px"><center>No.</center></th>
						  <th style="width:200px"><center>Kode Barang</center></th>
						  <th><center>Nama Barang</center></th>
						  <th style="width:150px"><center>Harga</center></th>
						  <th style="width:120px"><center>Aksi</center></th>
						</tr>
					  </thead>
					  <tbody>
						
						<!--
						<?php $no=0; foreach ($barang as $b)
							{ $no++;  
							echo "<tr>
								<td><center>$no</center></td>
								<td><center>$b->kode_barang</center></td>
								<td>$b->nama_barang</td>
								<td><center>$b->harga</center></td>
								<td><center>
									<a href='barang/edit/$b->kode_barang'><button class='btn btn-sm btn-info' type='button' data-placement='top' data-toggle='tooltip' data-original-title='Edit'><i class=' fa fa-pencil-square-o fa-lg'></i></button><a>
									<a href='barang/delete/$b->kode_barang'><button class='btn btn-sm btn-danger' type='button' data-placement='top' data-toggle='tooltip' data-original-title='Hapus'><i class=' fa fa-trash-o fa-lg'></i></button><a>
									
									<!--
									<button type='button' class='btn btn-primary btn-xs'>".anchor('barang2/edit/'.$b->kode_barang,'EDIT')."</button>
									<button type='button' class='btn btn-default btn-xs'>".anchor('barang2/delete/'.$b->kode_barang,'DELETE')."</button>
									-->
								</center></td>
								</tr>";
							}
						?>
						-->
						
					  </tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>
	
</div>
