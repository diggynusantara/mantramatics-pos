<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title;?></title>

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>
				
                <h1 class="logo-name">D.</h1>
				
            </div>
            <h3>Reset Password</h3>
			<br/>
			<div class="alert alert-info">
				Hello <span><?php echo $nama; ?></span>, Silakan isi password baru anda.
			</div>
			
            <?php echo form_open('forgotpassword/reset_password/token/'.$token); ?> 
                
				<div class="form-group">
                    <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="New Password">
					<p><?php echo form_error('password'); ?></p>
				</div>
				
				<div class="form-group">
                    <input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>" class="form-control" placeholder="Password Confirm">
					<p><?php echo form_error('passconf'); ?></p>
				</div>
                
				<button type="submit" name="btnSubmit" value="Reset" class="btn btn-primary block full-width m-b">Reset</button>
				
				<div>
					<a href="<?php echo base_url();?>login" class="to_register">www.dcorp.com</a>
				</div>
				
            <?php echo form_close();?>
            <h3><small>© 2017 All Rights Reserved.</small></h3>
       
	   </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url() ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    
</body>
</html>
