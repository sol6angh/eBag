
        <br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Restrict Accounts</h1>
          <?php if($this->session->tempdata('user_restricted')): ?>
            <div class="alert alert-success alert-dismissible">
                  <?php echo $this->session->tempdata('user_restricted'); ?>
            </div>
          <?php elseif($this->session->tempdata('error_happend')): ?>
            <div class="alert alert-danger alert-dismissible">
                  <?php echo $this->session->tempdata('error_happend'); ?>
            </div>
          <?php elseif($this->session->tempdata('user_un_restricted')): ?>
            <div class="alert alert-success alert-dismissible">
                  <?php echo $this->session->tempdata('user_un_restricted'); ?>
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
                  <th>Is Restricted</th>
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
                  <?php if($user->is_restricted == 1): ?>
                    <td><span class="badge">Restricted</span></td>
                  <?php else: ?>
                    <td>-</td>
                  <?php endif; ?>
                  <td><?php echo date("F j, Y, g:i a",strtotime($user->created_at)); ?></td>
                  <?php if($user->is_restricted == 1): ?>
                    <td><a href="<?php echo base_url(); ?>admin/Admin/un_restrict_account/<?php echo $user->id; ?>" class="btn btn-success">Activate</a></td>
                  <?php else: ?>
				            <td><a href="<?php echo base_url(); ?>admin/Admin/restrict_account/<?php echo $user->id; ?>" class="btn btn-warning">Un Activate</a></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
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
