

          <div class="">
		  
		  <div class="page-title">
              <div class="title_left">
                <h4>&nbsp; <small>Gambar / Tambah </small></h4>
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
                    <h2>Form Upload Gambar <small>&nbsp;</small></h2>
					<ul class="nav navbar-right panel_toolbox">
					  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
					  <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
					<div class="nav navbar-right">
						<a href="<?php echo base_url()?>gambar"><button class="btn btn-primary">Daftar File Gambar</button></a></li>
				    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
					
					<?=$this->session->flashdata('pesan')?>
                    
					<form action="<?php echo base_url()?>gambar/update" method="post" enctype="multipart/form-data" id="" data-parsley-validate class="form-horizontal form-label-left">
					
					<div class="form-group">
						<label class="col-lg-2 control-label">File Foto</label>
						<div class="col-sm-3">
							<input type="file" name="filefoto" required="required" class="form-control">
							<input type="hidden" name="filefoto" class="form-control" value="<?php echo $row->nama_gambar;?>">
							<input type="hidden" name="kode" class="form-control" value="<?php echo $row->id;?>">
                        </div>
						<div class="col-sm-3">
							<img src="<?=base_url()?>assets/uploads/<?=$row->nama_gambar?>" alt="" style="width:65%">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label">Keterangan</label>
						<div class="col-sm-5">
							<textarea name="textket" class="form-control" required="required"><?=$row->ket_gambar?></textarea>
                        </div>
					</div>
					
                    <br/><div class="ln_solid"></div>
                      
					<div class="form-group">
						<label class="col-lg-2 control-label">&nbsp;</label>
						<div class="col-sm-5">
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
