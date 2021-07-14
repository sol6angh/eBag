<br><br>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <h2 class="sub-header">Latest Materials</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Number</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Publisher</th>
                  <th>Created at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($latest_materials as $material): ?>
                <tr>
                  <td><?php echo $material->number; ?></td>
                  <td><?php echo $material->title; ?></td>
                  <?php if($material->is_free == 1) : ?>
                        <td class="card-text text-danger">Free</td>
                  <?php else : ?>
                        <td class="card-text text-danger"><?php 
                          echo number_format($material->price, '2', '.', ' ') . ' SR'; ?></td>
                  <?php endif; ?>
                  <td><?php echo $material->category_name; ?></td>
                  <td><?php echo $material->username; ?></td>
                  <td><?php echo date("F j, Y, g:i a",strtotime($material->uploaded_at)); ?></td>
				          <td><a href="<?php echo base_url(); ?>Document/show_material/<?php echo $material->id; ?>" target="_blank" class="btn btn-primary">View</a> <a href="<?php echo base_url(); ?>admin/Admin/view_edit_material/<?php echo $material->id; ?>" class="btn btn-success">Edit</a> <a href="<?php echo base_url(); ?>admin/Admin/delete_material/<?php echo $material->id; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
		  <div class="row">
		<div class="col-md-6">
			<h3>Latest Orders</h3>
			<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Buyer ID</th>         
                  <th>Transaction ID</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($latest_orders as $order): ?>
                <tr>
                  <td><?php echo $order->id; ?></td>
                  <td><?php echo $order->buyer_id; ?></td>
                  <td><?php echo $order->transaction_id; ?></td>
                  <td>Complete</td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
		</div>
		<div class="col-md-6">
			<h3>Latest Users Registered</h3>
			<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>         
                  <th>Username</th>
                  <th>Join Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($latest_users as $user): ?>
                <tr>
                  <td><?php echo $user->id; ?></td>
                  <td><?php echo $user->username; ?></td>
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
