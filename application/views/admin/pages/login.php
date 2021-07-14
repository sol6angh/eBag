<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/test.png" type="image/x-icon">
    <title>Admin | Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/admin/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/admin/css/signin.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <?php echo form_open(base_url() . 'admin/Authenticate/login'); ?>
        <div class="form-signin">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" style="margin-left: 15px;" alt="">
          <h2 style="text-align: center">Adminstrator Login</h2>
          <div style="color: red; text-align: center"><?php echo validation_errors(); ?></div>
          <?php if($this->session->tempdata('admin_error')): ?>
            <div style="color: red; text-align: center"><?php echo $this->session->tempdata('admin_error'); ?></div>
          <?php endif; ?>
          <input type="text" class="form-control" name="number" placeholder="Enter Admin Number" required autofocus>
          <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </div>
      </form>

    </div> 

  </body>
</html>
