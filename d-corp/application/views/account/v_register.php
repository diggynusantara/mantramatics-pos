<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Register</title>

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
            <h3>Register to D. Corporation</h3>
			
            <?php echo form_open('register');?>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo set_value('name'); ?>">
					<p><?php echo form_error('name'); ?></p>
				</div>
				
				<div class="form-group">
                    <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Username">
					<p><?php echo form_error('username'); ?></p>
				</div>
                
				<div class="form-group">
                    <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email">
					<p><?php echo form_error('email'); ?></p>
				</div>
                
				<div class="form-group">
                    <input type="hidden" name="level" value="2" class="form-control">
					<input type="hidden" name="is_active" value="1" class="form-control">
				</div>
				
				<div class="form-group">
                    <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="Password">
					<p><?php echo form_error('password'); ?></p>
				</div>
				
				<div class="form-group">
                    <input type="password" name="password_conf" value="<?php echo set_value('password_conf'); ?>" class="form-control" placeholder="Password Confirm">
					<p><?php echo form_error('password_conf'); ?></p>
				</div>
                
				<button type="submit" name="btnSubmit" value="Daftar" class="btn btn-primary block full-width m-b">Register</button>
				
				<div>
					<p class="change_link">Already a member ?
					<a href="<?php echo base_url();?>login" class="to_register"> Log In </a>
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
