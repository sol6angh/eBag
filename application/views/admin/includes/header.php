<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/test.png" type="image/x-icon">
    <title>My e-bag | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/admin/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/admin/css/dashboard.css" rel="stylesheet">

  </head>

  <body>

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>admin/Admin/index/true">My e-bag</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->first_name; ?> <?php echo $this->session->last_name; ?></a></li>
            <li><a href="<?php echo base_url(); ?>admin/Authenticate/logout">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search for Material...">
          </form>
        </div>
      </div>
    </div>