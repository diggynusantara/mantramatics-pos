<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Input Data Gambar</h2>
		<ol class="breadcrumb">
			<li>
				<a>Home</a>
			</li>
			<li>
				<a>Gambar</a>
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
					<a href="<?php echo base_url()?>gambar"><button class="btn btn-sm btn-success">Daftar Gambar</button></a></li>
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
                    
					<form action="<?php echo base_url()?>gambar/insert" method="post" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal">
					
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">File Foto
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="filefoto" required="required" class="form-control">
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Keterangan Foto
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="textket" class="form-control" required="required"></textarea>
						</div>
                      </div>
					  
                      <br/>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" value="Simpan">Simpan</button>
                          <button type="submit" class="btn btn-danger" onclick="history.back()">Batal</button>
                        </div>
                      </div>

                    </form>
				
			</div>
		</div>
	</div>
</div>
</div>
