<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>D. CORP | INSPINIA</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	
	<!--datatable-->
	<link href="<?php echo base_url(); ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
	
</head>

<body>

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
							<div class="social-feed-separated">
							<div class="social-avatar">
                                <img alt="image" class="img-circle" src="<?php echo base_url().'assets/img/'.$this->session->userdata('photo');?>">
							</div>
                            </div>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<span class="clear">
								<span class="block m-t-xs">
									<?php echo $this->session->userdata('nama'); ?>
								</span>
								<span class="text-muted text-xs block">
									<?php if($this->session->userdata('level') == 1) { ?> (Administrator) <?php } else { ?> (Operator) <?php } ?>
								<b class="caret"></b>
								</span> 
								</span>
							</a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo base_url();?>profile">Profile</a></li>
                                <li><a href="<?php echo base_url();?>contacts">Contacts</a></li>
                                <li><a href="<?php echo base_url();?>login/logout">Log Out</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            D.
                        </div>
                </li>
                
                    <li class="">
                        <a href="<?php echo base_url();?>dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> </a>
                    </li>
					
					<li>
                        <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">My Project </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url();?>barang">Barang</a></li>
							<li><a href="<?php echo base_url();?>gambar">Gambar</a></li>
                            <li>
                                <a href="#">JOIN <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url();?>join">Inner & Cross</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>join/left_join">Left Join</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>join/right_join">Right Join</a>
                                    </li>

                                </ul>
                            </li>
                            
                        </ul>
                    </li>
					<!--
                    <li>
                        <a href="<?php echo base_url(); ?>gambar"><i class="fa fa-diamond"></i> <span class="nav-label">Gambar</span></a>
                    </li>
					-->
					<li>
                        <a href="<?php echo base_url(); ?>contacts"><i class="fa fa-users"></i> <span class="nav-label">Contacts</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gear"></i> <span class="nav-label">Setting</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo base_url(); ?>profile">Profile</a></li>
								<?php if($this->session->userdata('level')=='1'): ?>
							<li><a href="<?php echo base_url(); ?>user">User</a></li>
								<?php endif; ?>
						</ul>
                    </li>
            </ul>

        </div>
    </nav>
	
	<div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome in D. Corp <?php if($this->session->userdata('level') == 1) { ?> <strong>Administrator !</strong> <?php } else { ?> <strong>Operator !</strong> <?php } ?></span>
                </li>
                <li>
                    <a href="<?php echo base_url()?>login/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
		
		<!--content start-->
			
			<?php echo $contents;?>
		
		<!--content stop-->
        
    <div class="footer">
		<div class="pull-right">
			<strong>D. Corporation</strong>
		</div>
		<div>
			<strong>Edited by</strong> D. Ahma &copy; 2017
		</div>
	</div>

    </div>
	
	
	
</div>

<!-- Mainly scripts -->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jeditable/jquery.jeditable.js"></script>

<script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/datatables.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

<!-- Jvectormap -->
<script src="<?php echo base_url(); ?>assets/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script>
	$(document).ready(function(){
		
		var mapData = {
			"US": 498,
			"SA": 200,
			"CA": 1300,
			"DE": 220,
			"FR": 540,
			"CN": 120,
			"AU": 760,
			"BR": 550,
			"IN": 200,
			"GB": 120,
			"RU": 2000
		};

		$('#world-map').vectorMap({
			map: 'world_mill_en',
			backgroundColor: "transparent",
			regionStyle: {
				initial: {
					fill: '#e4e4e4',
					"fill-opacity": 1,
					stroke: 'none',
					"stroke-width": 0,
					"stroke-opacity": 0
				}
			},
			series: {
				regions: [{
					values: mapData,
					scale: ["#1ab394", "#22d6b1"],
					normalizeFunction: 'polynomial'
				}]
			}
		});
	});
</script>

<?php
$this->load->view('footer/datatable.php');
?>

</body>

</html>
