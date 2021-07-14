<?php if($this->session->tempdata('password_changed')) : ?>
          <div class="container-fluid">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('password_changed'); ?>
            </div>
          </div>
<?php endif; ?>

  <div class="container-fluid mt-4">
      <h4>Edit your password</h4>
      <hr>
    <span style="color: red;"><?php echo validation_errors(); ?></span>
    <?php echo form_open(base_url() . 'User/change_password'); ?>
        <div class="row">
                <h6 class="col-4">Old Password:
                <input class="form-control" type="password" name="oldpass" required>
                </h6>
        </div>
        <br>
        <div class="row">

                <h6 class="col-4">New Password:
                <input class="form-control" type="password" name="newpass" required>
                </h6>
                
                <h6 class="col-6">
                    <br>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                    <a href="<?php echo base_url(); ?>User/view_profile/<?php echo $this->session->id; ?>" style="padding: 6px 45px 6px 45px;" class="btn btn-dark">Back</a>
                </h6>
        </div>
        <br>
        <div class="row">
                <h6 class="col-4">Confirm New Password: 
                    <input class="form-control" type="password" name="confirmpass" required>
                </h6>
                <input type="hidden" name="user_id" value="<?php echo $this->session->id; ?>">
        </div>
    </form>
    <br><br><br><br>
  </div>

  