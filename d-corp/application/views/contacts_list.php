<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Data Contacts</h2>
		<ol class="breadcrumb">
			<li>
				<a>Home</a>
			</li>
			<li class="active">
				<strong>Contacts</strong>
			</li>
		</ol>
	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
	
		<? if(empty($query)){ ?>
		<tr>
			<td>Data tidak ada</td>
		</tr>
		<? }else{ foreach($query as $rowdata){  ?>
		
		<div class="col-lg-4">
			<div class="contact-box">
				<a href="profile.html">
				<div class="col-sm-4">
					<div class="text-center">
						<img alt="image" class="img-circle m-t-xs img-responsive" src="<?php echo base_url();?>assets/img/<?=$rowdata->photo?>">
						<div class="m-t-xs font-bold"><?php if($rowdata->is_active == 1) { ?> Active <?php } else { ?> Non-Active <?php } ?></div>
					</div>
				</div>
				<div class="col-sm-8">
					<h4><strong><?=$rowdata->nama?></strong></h4>
					<address>
						<?php if($rowdata->level == 1) { ?> Administrator <?php } else { ?> Operator <?php } ?>
						<br/>
						<?=$rowdata->email?><br/>
					</address>
				</div>
				<div class="clearfix"></div>
					</a>
			</div>
		</div>
		
		<? }}?>
		
	</div>
</div>