

    <br><br><br><br><br><br><br><br>
    <h1 style="text-align: center;">Login</h1>
    <br>

    <div style="text-align: center; font-size: 20px;">
    <?php if($this->session->tempdata('user_not_found')) : ?>
      <div style="text-align: center; color: red;"><?php echo $this->session->tempdata('user_not_found'); ?></div>
    <?php endif; ?>
      <form action="<?php echo base_url(); ?>Authenticate/login" method="POST">
          <label><b>Username or Email:</b></label>&nbsp;
          <input style="width: 300px; margin-right: 88px;" type="text" placeholder="Enter Username or Email" name="username_email" required>
          <br><br>

          <label><b>Password:</b></label>&nbsp;
          <input style="width: 300px;" type="Password" placeholder="Enter Password" name="password" required>
          <br><br>

          <button class="button" type="submit">Login</button>
      </form>
    </div>
  
  
    <br><br><br><br><br><br><br><br><br><br>
