<?php if($this->session->logged_in) : ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title><?php echo $title; ?> | My e-bag</title>
      <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/test.png" type="image/x-icon">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/user/style.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/public/style.css">
      
    </head>
    <body>

      <nav class="navbar navbar-expand fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo base_url(); ?>View/view_pages/index"><img class="img-nav" src="<?php echo base_url() ?>assets/img/test.png"></a>
        <?php if(isset($without_search_bar)) : ?>  
        
        <?php else: ?>
          <a style="font-size: 11px; color: black; text-align: center; margin-left: 50px;" href ="<?php echo base_url(); ?>View/view_pages/search"><b><u>Advanced <br> Search</u></b></a>
            <form method="POST" action="<?php echo base_url(); ?>Document/search_for_material" style="margin-left: 10px;">
              <div class="input-group">
                <input type="text" class="form-control" name="search_for_material" size="55" placeholder="Search for material.." required>
                <div class="input-group-append">
                  <button id="search_button" class="btn btn-outline-dark" type="submit"><span class="fa fa-search"></span></button>
                </div>
              </div>
            </form>
        <?php endif; ?>
        <ul class="navbar-nav ml-auto">
          <div class="dropdown_profile">
            <li><h6><a href="#"><?php echo $this->session->firstname; ?> <?php echo $this->session->lastname; ?> <i class="fa fa-caret-down" style="font-size:23px;"></i></a></h6>
                <div class="dropdown-content">
                  <a style="color: black;" target="_blank" href="<?php echo base_url(); ?>Dashboard/view_dashboard/dashboard">My Dashboard</a>
                  <a style="color: black;" href="<?php echo base_url(); ?>User/view_orders/<?php echo $this->session->id; ?>">My Orders</a>
                  <a style="color: black;" href="<?php echo base_url(); ?>User/view_profile/<?php echo $this->session->id; ?>">My Profile</a>
                  <a style="color: black;" href="<?php echo base_url(); ?>Authenticate/logout">Logout <i class="fa fa-power-off" style="font-size:20px; color: black;"></i></a>
                </div>
            </li>
          </div>
            &emsp;&emsp;
            <li><h6><a href="<?php echo base_url(); ?>User/view_bag/<?php echo $this->session->id; ?>">My Bag <i class="fa fa-briefcase" style="font-size:20px; margin-top: 2px;"></i></a></h6></li>
            &emsp;&emsp;
            <li><h6><a href="<?php echo base_url(); ?>View/view_pages/about">About us <i style="font-size:20px;" class="fa fa-group"></i></a></h6></li>
            &emsp;&emsp;
            <li><h6><a href="<?php echo base_url(); ?>View/view_pages/contact">Contact us <i style="font-size:20px;" class="fa fa-envelope-open"></i></a></h6></li>
            &emsp;&emsp;
            <li><h6><a href="<?php echo base_url(); ?>View/view_pages/faq">FAQ <i style="font-size:20px;" class="fa fa-exclamation-circle"></i></a></h6></li>
          </ul>
    </nav>
    

    <?php if($this->session->tempdata('user_activated')) : ?>
      <br><br><br><br><br>
      <div class="container-fluid">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('user_activated'); ?>
            </div>
      </div>
      <div class="navbar1 mt-2">
        <a href="<?php echo base_url(); ?>Document/get_materials/7">Assignments</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/1">Projects</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/2">Slides</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/3">Books</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/4">Practice Question</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/5">Previous Exams</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/6">Quizes</a>
        <a href="<?php echo base_url(); ?>Community/get_universities">Community</a>
      </div>
    <?php elseif($this->session->tempdata('user_logged_in')) : ?>
      <br><br><br><br><br>
      <div class="container-fluid">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('user_logged_in'); ?>
            </div>
      </div>
      <div class="navbar1 mt-2">
        <a href="<?php echo base_url(); ?>Document/get_materials/7">Assignments</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/1">Projects</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/2">Slides</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/3">Books</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/4">Practice Question</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/5">Previous Exams</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/6">Quizes</a>
        <a href="<?php echo base_url(); ?>Community/get_universities">Community</a>
      </div>
    <?php endif; ?>

<?php if(isset($edited_header)) : ?>

<?php else: ?>
  <br><br><br><br>
      <div class="navbar1 mt-2">
        <a href="<?php echo base_url(); ?>Document/get_materials/7">Assignments</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/1">Projects</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/2">Slides</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/3">Books</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/4">Practice Question</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/5">Previous Exams</a>
        <a href="<?php echo base_url(); ?>Document/get_materials/6">Quizes</a>
        <a href="<?php echo base_url(); ?>Community/get_universities">Community</a>
      </div>
<?php endif; ?>

<?php else: ?>
      <!DOCTYPE html>
      <html lang="en">
      <head>
      <title><?php echo $title; ?> | My e-bag</title>
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/test.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/public/style.css">
        
      </head>
      <body>
          
        <nav class="navbar navbar-expand fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="<?php echo base_url(); ?>View/view_pages/index"><img class="img-nav" src="<?php echo base_url() ?>assets/img/test.png"></a>
      <?php if(isset($without_search_bar)) : ?>  
        
      <?php else: ?>
        <a style="font-size: 11px; color: black; text-align: center; margin-left: 50px;" href ="<?php echo base_url(); ?>View/view_pages/search"><b><u>Advanced <br> Search</u></b></a>
          <form method="POST" action="<?php echo base_url(); ?>Document/search_for_material" style="margin-left: 10px;">
            <div class="input-group">
              <input type="text" class="form-control" name="search_for_material" size="55" placeholder="Search for material.." required>
              <div class="input-group-append">
                <button id="search_button" class="btn btn-outline-dark" type="submit"><span class="fa fa-search"></span></button>
              </div>
            </div>
          </form>
      <?php endif; ?>

          <ul class="navbar-nav ml-auto">
            <li><h6><a href="<?php echo base_url(); ?>View/view_pages/about">About us <i style="font-size:20px;" class="fa fa-group"></i></a></h6></li>
                &emsp;&emsp;&emsp;
                <li><h6><a href="<?php echo base_url(); ?>View/view_pages/contact">Contact us <i style="font-size:20px;" class="fa fa-envelope-open"></i></a></h6></li>
                &emsp;&emsp;&emsp;
                <li><h6><a href="<?php echo base_url(); ?>View/view_pages/faq">FAQ <i style="font-size:20px;" class="fa fa-exclamation-circle"></i></a></h6></li>
                &emsp;&emsp;&emsp;
                <li><h6><a href="<?php echo base_url(); ?>View/view_pages/signup">Sign up <i style="font-size:23px;" class="fa fa-user-plus"></i></a></h6></li>
                &emsp;&emsp;&emsp;
                <li><h6><a href="<?php echo base_url(); ?>View/view_pages/login">Login <i style="font-size:27px;" class="fa fa-sign-in"></i></a></h6></li>
        </ul>
        
      </nav>


      <?php if(isset($edited_header)) : ?>

      <?php else: ?>
        <br><br><br><br>
            <div class="navbar1 mt-2">
              <a href="<?php echo base_url(); ?>Document/get_materials/7">Assignments</a>
              <a href="<?php echo base_url(); ?>Document/get_materials/1">Projects</a>
              <a href="<?php echo base_url(); ?>Document/get_materials/2">Slides</a>
              <a href="<?php echo base_url(); ?>Document/get_materials/3">Books</a>
              <a href="<?php echo base_url(); ?>Document/get_materials/4">Practice Question</a>
              <a href="<?php echo base_url(); ?>Document/get_materials/5">Previous Exams</a>
              <a href="<?php echo base_url(); ?>Document/get_materials/6">Quizes</a>
              <a href="<?php echo base_url(); ?>Community/get_universities">Community</a>
            </div>
      <?php endif; ?>

<?php endif; ?>