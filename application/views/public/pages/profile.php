<?php if($this->session->tempdata('info_updated')) : ?>
      <div class="container-fluid">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('info_updated'); ?>
            </div>
      </div>
<?php endif; ?>
<?php if(isset($my_profile)) : ?> 
    <div class="container-fluid mt-3">
            <div style="text-align: center;">
                <h3>My Profile</h3>
                <img class="rounded-circle" src="<?php echo base_url(); ?>assets/img/avatar.png" width="300px" height="270px" alt="">
            </div>

            <table class="table mt-3">
                <thead class="thead-light">
                  <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Phone number</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $my_profile->firstname; ?></td>
                    <td><?php echo $my_profile->lastname; ?></td>
                    <td><?php echo $my_profile->email; ?></td>
                    <td><?php echo $my_profile->username; ?></td>
                    <td>
                      <?php if(empty($my_profile->phone_number)): ?>
                        -
                      <?php else: ?>
                        +966 <?php echo substr($my_profile->phone_number, 1); ?>
                      <?php endif; ?>
                      </td>
                  </tr>
                </tbody>
                <thead class="thead-light">
                    <tr>
                      <th>City</th>
                      <th>University</th>
                      <th>Faculty</th>
                      <th>Account validation</th>
                      <th>Created at</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                      <?php if(empty($my_profile->city)): ?>
                        -
                      <?php else: ?>
                        <?php echo $my_profile->city; ?>
                      <?php endif; ?>
                      </td>
                      <td>
                      <?php if(empty($my_profile->university_id)): ?>
                        -
                      <?php else: ?>
                        <?php echo $my_profile->university_name; ?>
                      <?php endif; ?>
                      </td>
                      <td>
                      <?php if(empty($my_profile->faculty_id)): ?>
                        -
                      <?php else: ?>
                        <?php echo $my_profile->faculty_name; ?>
                      <?php endif; ?>
                      </td>
                      <?php if($my_profile->is_activate == 1) : ?>
                      <td class="text-success"><b>activated</b></td>
                      <?php else: ?>
                      <td class="text-danger"><b>not activated</b></td>
                      <?php endif; ?>
                      <td><?php echo $my_profile->created_at; ?></td>
                    </tr>
                  </tbody>
              </table>

              <ul>
                  <li style="display: inline;"><a href="<?php echo base_url(); ?>User/view_edit_account/<?php echo $my_profile->id; ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a></li>
                  <li style="display: inline;"><a href="<?php echo base_url(); ?>View/view_pages/change_password" class="btn btn-secondary">Change Password</a></li>
                  <li style="display: inline;"><a href="<?php echo base_url(); ?>User/delete_account/<?php echo $my_profile->id; ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i> Delete account</a></li>
              </ul>            
    </div>

    <!-- Modal Start -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Delete Account</h4>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
            <h6>Are you sure to delete your account?</h6>
            <div>
              your account will be deleted immediately, so you can't back.
            </div>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <a href="<?php echo base_url(); ?>User/delete_account/<?php echo $my_profile->id; ?>" class="btn btn-danger">Yes Delete it</a>
            <a href="<?php echo base_url(); ?>User/view_profile/<?php echo $my_profile->id; ?>" class="btn btn-light">No Keep it</a>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Modal End -->

    <br>
<?php elseif(isset($guest_profile)): ?>
  <div class="container-fluid mt-3">

            <div style="text-align: center;">
                <h3><?php echo $guest_profile->username; ?> Profile</h3>
                <img class="rounded-circle" src="<?php echo base_url(); ?>assets/img/avatar.png" width="300px" height="270px" alt="">
            </div>

            <table class="table mt-3">
                <thead class="thead-light">
                  <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Phone number</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $guest_profile->firstname; ?></td>
                    <td><?php echo $guest_profile->lastname; ?></td>
                    <td><?php echo $guest_profile->email; ?></td>
                    <td><?php echo $guest_profile->username; ?></td>
                    <td>-</td>
                  </tr>
                </tbody>
                <thead class="thead-light">
                    <tr>
                      <th>City</th>
                      <th>University</th>
                      <th>Faculty</th>
                      <th>Account validation</th>
                      <th>Created at</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                      <?php if($guest_profile->city == null): ?>
                        -
                      <?php else: ?>
                        <?php echo $guest_profile->city; ?>
                      <?php endif; ?>
                      </td>
                      <td>
                      <?php if($guest_profile->university_id == null): ?>
                        -
                      <?php else: ?>
                        <?php echo $guest_profile->university_name; ?>
                      <?php endif; ?>
                      </td>
                      <td>
                      <?php if($guest_profile->faculty_id == null): ?>
                        -
                      <?php else: ?>
                        <?php echo $guest_profile->faculty_name; ?>
                      <?php endif; ?>
                      </td>
                      <?php if($guest_profile->is_activate == 1) : ?>
                      <td class="text-success"><b>activated</b></td>
                      <?php else: ?>
                      <td class="text-danger"><b>not activated</b></td>
                      <?php endif; ?>
                      <td><?php echo $guest_profile->created_at; ?></td>
                    </tr>
                  </tbody>
              </table>

  </div>
<?php else: ?>

<?php endif; ?>

   