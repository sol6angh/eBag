<?php if($this->session->tempdata('contact_sent')) : ?>
          <div class="container-fluid">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('contact_sent'); ?>
            </div>
          </div>
<?php endif; ?>
<div class="container mt-2">
        <br><br>
          <div class="row">
              <div class="col-5">
              <?php if($this->session->logged_in): ?>
                  <h2 class="">Contact us and send Feedback</h2>
                  <form action="<?php echo base_url(); ?>User/contact" method="POST">
                  <div style="color: red;"><?php echo $this->session->tempdata('error_contact'); ?></div>
                    <label for="contact">Select a topic:</label> <br>
      
                    <select class="form-control mt-2" class="drop" name="title" id="contact">
                      <option value="0"> Choose here </option> 
                      <option value="suggestion">Suggestion</option>
                      <option value="error">Error</option>
                      <option value="message">Message</option>
      
                      <h6 class="form-group">Description:
                          <textarea name="description" cols="30" rows="5" class="form-control mt-2" placeholder="Enter details here.." required></textarea>
                      </h6> <br>
      
                      <button type="submit" class="btn btn-dark">Submit</button>
                  </form>
                <?php else: ?>
                  <h2 class="">Contact us and send Feedback</h2>
                  <form action="<?php echo base_url(); ?>User/contact" method="POST">
                  <div style="color: red;"><?php echo $this->session->tempdata('error_contact'); ?></div>
                  <label for="contact">Email:</label> <br>
                  <input type="email" class="form-control mb-2" required name="email" placeholder="name@example.com">

                    <label for="contact">Select a topic:</label> <br>
      
                    <select class="form-control" class="drop" name="title" id="contact">
                      <option value="0"> Choose here </option> 
                      <option value="suggestion">Suggestion</option>
                      <option value="error">Error</option>
                      <option value="message">Message</option>
      
                      <h6 class="form-group">Description:
                          <textarea name="description" cols="30" rows="5" class="form-control mt-2" placeholder="Enter details here.." required></textarea>
                      </h6> <br>
      
                      <button type="submit" class="btn btn-dark">Submit</button>
                  </form>
                <?php endif; ?>
              </div>
      
              <div class="col-1">
      
              </div>
      
              <div class="col-4 mt-2">
                  <img class="mt-4 mb-2" src="<?php echo base_url(); ?>assets/img/contact-us.png" width="350px" height="260px" alt="">
                  <t1 style="font-size:30px;"><strong>Help us do better</strong></t1><br>
                  <t2>Use the form to send us your feedback and ideas on how we can improve.</t2>
              </div>
          </div>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
              
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          
              
          <br><br><br><br><br><br>
          <h1 id="social" style="text-align: center; color: black;"><b>My <font color="#ff9700">e-bag</font> Social Media Accounts</b></h1><br>
          <br><br>
          &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <img style="width: 80px; height: 80px;" src="<?php echo base_url(); ?>assets/img/Twitter.png">
          &emsp;&emsp; <t style="font-size: 30px;">www.Twitter.com/Mye-bag</t>
          <br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <img style="width: 80px; height: 80px;" src="<?php echo base_url(); ?>assets/img/Facebook.png">
          &emsp;&emsp; <t style="font-size: 30px;">www.Facebook.com/Mye-bag</t>
          <br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <img style="width: 80px; height: 80px;" src="<?php echo base_url(); ?>assets/img/Instagram.png">
          &emsp;&emsp; <t style="font-size: 30px;">www.Instagram.com/Mye-bag</t>
          <br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
          <img style="width: 80px; height: 80px;" src="<?php echo base_url(); ?>assets/img/Youtube.png">
          &emsp;&emsp; <t style="font-size: 30px;">www.Youtube.com/Mye-bag</t>
      </div>
      
      <br><br><br>