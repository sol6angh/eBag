
        <br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Access and Modify Materials</h1>
          <?php if($this->session->tempdata('material_updated')): ?>
            <div class="alert alert-success alert-dismissible">
                  <?php echo $this->session->tempdata('material_updated'); ?>
            </div>
          <?php elseif($this->session->tempdata('error_happend')): ?>
            <div class="alert alert-danger alert-dismissible">
                  <?php echo $this->session->tempdata('error_happend'); ?>
            </div>
          <?php elseif($this->session->tempdata('material_deleted')): ?>
            <div class="alert alert-success alert-dismissible">
                  <?php echo $this->session->tempdata('material_deleted'); ?>
            </div>
          <?php endif; ?>
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
              <?php foreach($materials as $material): ?>
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
            <br><hr>
            <h1 class="page-header">Material Deleted</h1>
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
              <?php foreach($materials_deleted as $material_deleted): ?>
                <tr>
                  <td><?php echo $material_deleted->number; ?></td>
                  <td><?php echo $material_deleted->title; ?></td>
                  <?php if($material_deleted->is_free == 1) : ?>
                        <td class="card-text text-danger">Free</td>
                  <?php else : ?>
                        <td class="card-text text-danger"><?php 
                          echo number_format($material_deleted->price, '2', '.', ' ') . ' SR'; ?></td>
                  <?php endif; ?>
                  <td><?php echo $material_deleted->category_name; ?></td>
                  <td><?php echo $material_deleted->username; ?></td>
                  <td><?php echo date("F j, Y, g:i a",strtotime($material_deleted->uploaded_at)); ?></td>
				          <td><a href="<?php echo base_url(); ?>Document/show_material/<?php echo $material_deleted->id; ?>" target="_blank" class="btn btn-primary">View</a></td>
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
