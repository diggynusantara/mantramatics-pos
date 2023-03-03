<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>D. Corp | Login</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>

			<?php // Cetak session salah password       
				if($this->session->flashdata('sukses')) {
				echo 
				'<div class="alert alert-danger alert-dismissable">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							'.$this->session->flashdata('sukses').'<a class="alert-link"></a>.
						</div>';
				}
			?>
            <?php // Cetak session logout      
				if($this->session->flashdata('sukseslogout')) {
				echo 
				'<div class="alert alert-success alert-dismissable">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							'.$this->session->flashdata('sukseslogout').'<a class="alert-link"s></a>.
						</div>';
				}
			?>
			<?php // Cetak sukses memperbaharui password      
				if($this->session->flashdata('suksesnewpass')) {
				echo 
				'<div class="alert alert-success alert-dismissable">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							'.$this->session->flashdata('suksesnewpass').'<a class="alert-link"s></a>.
						</div>';
				}
			?>
			
			<div>

                <h1 class="logo-name">D.</h1>

            </div>
            
			<h3>D. CORPORATION</h3>
			
			<?php echo form_open('login');?>   
		   
                <div class="form-group">
					<input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username"> 
					<p> <?php echo form_error('username'); ?> </p>
				</div>
                
				<div class="form-group">
                    <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password">
					<p> <?php echo form_error('password'); ?> </p>   
                </div>
				
                <button type="submit" name="btnSubmit" value="Login" class="btn btn-success block full-width m-b">Login</button>
				
				<div><center>
					<a href="<?php echo base_url();?>forgotpassword">Lost password? &nbsp; &nbsp;</a>
					--OR--
					<a href="<?php echo base_url();?>register" class="to_register">&nbsp; &nbsp; Create Account</a>
				</center></div>
				
            <?php echo form_close();?>
            
			<h3><small>© 2017 All Rights Reserved.</small></h3>
			
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>

</html>

