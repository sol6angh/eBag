
<?php if(isset($faculties)) : ?>
  <div class="container-fluid mt-4">
        <h4>Select your university and faculty</h4>
        <hr>
        <form action="<?php echo base_url(); ?>User/update_university_and_faculty" method="post">
          <div class="row">
          <h6 class="col-5">Select University: 
                <select name="select_university" class="form-control" required>
                    <option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
                </select>
            </h6>

            <h6 class="col-5">Select Faculty: 
                <select name="select_faculty" class="form-control" required>
                  <?php foreach($faculties as $faculty) : ?>
                    <option value="<?php echo $faculty->id; ?>"><?php echo $faculty->faculty_name; ?></option>
                  <?php endforeach; ?>
                </select>
            </h6>

            <div class="col-2" style="margin-top: 19px;">
              <button type="submit" class="btn btn-success">Save changes</button>
            </div>

          </div>
        </form>
          <br><br>

          <h4>Edit your account information</h4>
        <hr>
        <span style="text-align: center; color: red;"><?php echo validation_errors(); ?></span>
        <?php echo form_open(base_url() . 'User/edit_account'); ?>
          <div class="row">
            <div class="col-1">
            <input class="form-control" type="hidden" name="id" value="<?php echo $my_profile->id; ?>">
            </div>
            <h6 class="col-5">First Name: 
              <input class="form-control" type="text" name="firstname" value="<?php echo $my_profile->firstname; ?>">
            </h6>

            <h6 class="col-5">Last Name: 
                <input class="form-control" type="text" name="lastname" value="<?php echo $my_profile->lastname; ?>">
            </h6>
            <div class="col-1">
          
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-1">
            
            </div>
            <h6 class="col-5">Email: 
              <input class="form-control" type="text" name="email" readonly value="<?php echo $my_profile->email; ?>">
            </h6>

            <h6 class="col-5">Username: 
                <input class="form-control" type="text" name="username" readonly value="<?php echo $my_profile->username; ?>">
            </h6>
            <div class="col-1">
          
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-1">
            
            </div>
            <h6 class="col-5">Phone Number:
            <?php if($my_profile->phone_number == 0): ?>
              <input class="form-control" type="text" name="phone" value="">
            <?php else: ?>
              <input class="form-control" type="text" name="phone" value="<?php echo $my_profile->phone_number; ?>">
            <?php endif; ?>
            </h6>
            
            <h6 class="col-5">City: 
              <input class="form-control" type="text" name="city" value="<?php echo $my_profile->city; ?>">
            </h6>
            
            <div class="col-1">
            
            </div>
          </div>

          <div class="row">
            <div class="col-1">

            </div>

            


            <div class="col-4">
            
            </div>
            
            <div class="col-1">

            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-2">

            </div>

            <div class="col-4">
            <a href="<?php echo base_url(); ?>User/view_profile/<?php echo $this->session->id; ?>" class="btn btn-dark btn-block">Back</a>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Save changes</button>
            </div>

            <div class="col-2">
              
            </div>
          </div>
        </form>
        <br><br>
      </div>

<?php else: ?>
      <div class="container-fluid mt-4">

      <h4>Select your university and faculty</h4>
        <hr>
        <?php if($this->session->tempdata('no_select_university')) : ?>
          <span style="text-align: center; color: red;"><?php echo $this->session->tempdata('no_select_university'); ?></span>
        <?php endif; ?>
        <form action="<?php echo base_url(); ?>Community/get_faculties_based_on_university/true" method="post">
          <div class="row">
          <h6 class="col-5">Select University: 
                <select name="select_university" class="form-control" required>
                    <option value="0">-Select-</option>
                <?php foreach($universities as $university) : ?>
                    <option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
                <?php endforeach; ?>
                </select>
            </h6>
            
            <div class="col-2" style="margin-top: 19px;">
              <button type="submit" class="btn btn-primary">Select</button>
            </div>
          </div>
          <br><br>
        </form>

        <h4>Edit your account information</h4>
        <hr>
        <span style="text-align: center; color: red;"><?php echo validation_errors(); ?></span>
        <?php echo form_open(base_url() . 'User/edit_account'); ?>
          <div class="row">
            <div class="col-1">
            <input class="form-control" type="hidden" name="id" value="<?php echo $my_profile->id; ?>">
            </div>
            <h6 class="col-5">First Name: 
              <input class="form-control" type="text" name="firstname" value="<?php echo $my_profile->firstname; ?>">
            </h6>

            <h6 class="col-5">Last Name: 
                <input class="form-control" type="text" name="lastname" value="<?php echo $my_profile->lastname; ?>">
            </h6>
            <div class="col-1">
          
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-1">
            
            </div>
            <h6 class="col-5">Email: 
              <input class="form-control" type="text" name="email" readonly value="<?php echo $my_profile->email; ?>">
            </h6>

            <h6 class="col-5">Username: 
                <input class="form-control" type="text" name="username" readonly value="<?php echo $my_profile->username; ?>">
            </h6>
            <div class="col-1">
          
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-1">
            
            </div>
            <h6 class="col-5">Phone Number:
            <?php if($my_profile->phone_number == 0): ?>
              <input class="form-control" type="text" name="phone" value="">
            <?php else: ?>
              <input class="form-control" type="text" name="phone" value="<?php echo $my_profile->phone_number; ?>">
            <?php endif; ?>
            </h6>
            
            <h6 class="col-5">City: 
              <input class="form-control" type="text" name="city" value="<?php echo $my_profile->city; ?>">
            </h6>
            
            <div class="col-1">
            
            </div>
          </div>

          <div class="row">
            <div class="col-1">

            </div>

            


            <div class="col-4">
            
            </div>
            
            <div class="col-1">

            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-2">

            </div>

            <div class="col-4">
            <a href="<?php echo base_url(); ?>User/view_profile/<?php echo $this->session->id; ?>" class="btn btn-dark btn-block">Back</a>
            </div>

            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Save changes</button>
            </div>

            <div class="col-2">
              
            </div>
          </div>
        </form>
        <br><br>
      </div>
<?php endif; ?>
     