
        <br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Search User Information</h1>
          <?php if($this->session->tempdata('user_updated')): ?>
            <div class="alert alert-success alert-dismissible">
                  <?php echo $this->session->tempdata('user_updated'); ?>
            </div>
          <?php elseif($this->session->tempdata('error_happend')): ?>
            <div class="alert alert-danger alert-dismissible">
                  <?php echo $this->session->tempdata('error_happend'); ?>
            </div>
          <?php elseif($this->session->tempdata('user_deleted')): ?>
            <div class="alert alert-success alert-dismissible">
                  <?php echo $this->session->tempdata('user_deleted'); ?>
            </div>
          <?php endif; ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                  <th>Phone Number</th>
                  <th>Is Activate</th>
                  <th>Created at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($users as $user): ?>
                <tr>
                  <td><?php echo $user->id; ?></td>
                  <td><?php echo $user->firstname; ?></td>
                  <td><?php echo $user->lastname; ?></td>
                  <td><?php echo $user->username; ?></td>
                  <td><?php echo $user->phone_number; ?></td>
                  <?php if($user->is_activate == 1): ?>
                    <td style="color: green;">Activate</td>
                  <?php else: ?>
                    <td style="color: red;">Activate</td>
                  <?php endif; ?>
                  <td><?php echo date("F j, Y, g:i a",strtotime($user->created_at)); ?></td>
				          <td><a href="<?php echo base_url(); ?>User/view_profile/<?php echo $user->id; ?>" target="_blank" class="btn btn-primary">View</a> <a href="<?php echo base_url(); ?>admin/Admin/view_user_form/<?php echo $user->id; ?>" class="btn btn-success">Edit</a> <a href="<?php echo base_url(); ?>admin/Admin/delete_user/<?php echo $user->id; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>
