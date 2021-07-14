
<!DOCTYPE html>
<html lang="en">
<head>
<title>Account Restricted | My e-bag</title>
<link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/test.png" type="image/x-icon">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/public/style.css">

</head>
<body>
  
<nav class="navbar navbar-expand fixed-top navbar-light bg-light">
<a class="navbar-brand" href="<?php echo base_url(); ?>View/view_pages/index"><img class="img-nav" src="<?php echo base_url() ?>assets/img/test.png"></a>

  <ul class="navbar-nav ml-auto">
        <li><h6><a href="<?php echo base_url(); ?>Authenticate/logout">Logout <i style="font-size:27px;" class="fa fa-sign-in"></i></a></h6></li>
</ul>

</nav>


  <br><br><br><br><br>
  <h1 style="text-align: center;">Account Restricted</h1>
  <br>

  <div style="text-align: center; font-size: 20px;">
        <label><b>Sorry your account is restricted, please contact us to check</b></label><br>  
  </div>
        <?php if($this->session->tempdata('error_happend')): ?>
            <div style="color: red;">
                <?php echo $this->session->tempdata('error_happend'); ?>
            </div>
        <?php endif; ?>
  <div class="container mt-2">

          <div class="row">
                <div class="col-2">
                
                </div>
              <div class="col-4">
              <?php if($this->session->flashdata('contact_restrict')): ?>
              <br><br><br>
                <h4 style="color: green;"><?php echo $this->session->flashdata('contact_restrict'); ?></h4>
              <?php else: ?>
                <form action="<?php echo base_url(); ?>User/contact_restrict/<?php echo $this->session->id; ?>" method="POST">
                  <label for="contact">Your Email:</label>
                    <input class="form-control" type="email" name="email" required value="<?php echo $this->session->email; ?>">
                    
                    <label class="mt-2" for="contact">Topic:</label>
                    <select class="form-control" class="drop" name="title" id="contact">
                      <option value="restrict">Why my account is restricted?</option> 
      
                      <h6 class="form-group">Description:
                          <textarea name="description" cols="30" rows="5" class="form-control mt-2" placeholder="Enter details here.." required></textarea>
                      </h6> <br>
      
                      <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php endif; ?>
              </div>

              <div class="col-1">
                
                </div>
      
              <div class="col-2 mt-2">
                  <img class="mt-4" src="<?php echo base_url(); ?>assets/img/contact-us.png" width="350px" height="260px" alt="">
              </div>
          </div>
        </div>
  <br><br><br><br><br><br>

  <footer>

<div class="footer-top text-light"> <br>  

<div class="container ">

    <div class="row ml-5">    

        <div class="col-md-3 col-sm-6 col-xs-12 segment-one">
          <h2 style="font-size: 20px;">My e-bag</h2>
            <a style="font-size: 15px; color: white;" href="<?php echo base_url(); ?>View/view_pages/about">About us</a><br>
            <a style="font-size: 15px; color: white;" href="<?php echo base_url(); ?>View/view_pages/signup">Sign up</a><br>
            <a style="font-size: 15px; color: white;" href="<?php echo base_url(); ?>View/view_pages/login">Login</a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12 segment-two">
          <h2 style="font-size: 20px;">Legal</h2>
            <a style="font-size: 15px; color: white;" target="_blank" href="<?php echo base_url(); ?>View/view_pages/policy">Terms and Conditions</a><br>
            <a style="font-size: 15px; color: white;" target="_blank" href="<?php echo base_url(); ?>View/view_pages/policy">Privacy Policy</a>
            </ul>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12 segment-three">
          <h2 style="font-size: 20px;">Help</h2>
            <a style="font-size: 15px; color: white;" href="<?php echo base_url(); ?>View/view_pages/contact">Contact Us</a><br>
            <a style="font-size: 15px; color: white;" href="<?php echo base_url(); ?>View/view_pages/faq">FAQ</a>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12 segment-four">
            <h2 style="font-size: 20px;">Follow Us</h2>
            <a href="contact_us.html#social"><i style="font-size: 18px;" class="fa fa-twitter text-light"></i></a><br>
            <a href="contact_us.html#social"><i style="font-size: 20px;" class="fa fa-facebook text-light"></i></a><br>
            <a href="contact_us.html#social"><i style="font-size: 20px;" class="fa fa-instagram text-light"></i></a><br>
            <a href="contact_us.html#social"><i style="font-size: 20px;" class="fa fa-youtube text-light"></i></a><br>
        </div>
    </div>
</div>
<br>

<div class="container">
</div>

<h5 style="text-align: center;" class="text-light">&copy 2021 My e-bag. All Rights Reserves.</h5> 


</div>
</footer>

</body>
</html>
