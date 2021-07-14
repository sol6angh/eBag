<?php if(!isset($catched_id)): 

  $name = 'signup';
  
  redirect('View/view_pages/' . $name);

?>
<?php else: ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Validation | My e-bag</title>
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


    <br><br><br><br><br><br><br><br>
    <h1 style="text-align: center;">Validate your account</h1>
    <br>
    
    <?php if($this->session->tempdata('user_not_activated')) : ?>
        <div style="text-align: center; color: red;"><?php echo $this->session->tempdata('user_not_activated'); ?></div>
    <?php else: ?>
      <div style="text-align: center; color: red;"><?php echo validation_errors(); ?></div>
    <?php endif; ?>
    <div style="text-align: center; font-size: 20px;">
      <?php echo form_open('Authenticate/validate_code/'); ?>
          <label><b>Enter validation number here that sended to your email to activate your account:</b></label><br>
          <input style="width: 300px;" type="text" placeholder="xxxx" name="validation" required>
          <input type="hidden" name="catched_username" value="<?php echo $catched_id->username; ?>">
          <br><br>

          <button class="button" type="submit">Check</button>
      </form>
            <br>
            <form action="<?php echo base_url(); ?>User/send_code_again" method="post">
              <input type="hidden" name="catched_id" value="<?php echo $catched_id->id; ?>">
              <button type="submit" class="button_cancel">Send Again</button>
            </form>
            
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
<?php endif; ?>