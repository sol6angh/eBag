            

    <div class="contents bg-light">
        <div class="container mt-3">
            <h3>Manage material</h3>
            <?php if($this->session->tempdata('material_inserted')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('material_inserted'); ?>
                </div>
            <?php elseif($this->session->tempdata('material_updated')) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->tempdata('material_updated'); ?>
                    </div>
            <?php elseif($this->session->tempdata('material_deleted')) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->tempdata('material_deleted'); ?>
                    </div>
            <?php elseif($this->session->tempdata('error_happend')) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->tempdata('error_happend'); ?>
                    </div>
            <?php elseif($this->session->tempdata('error_set_api')) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $this->session->tempdata('error_set_api'); ?>
                    </div>
            <?php endif; ?>
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Material name</th>
                            <th>Number</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>University</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($my_materials as $material) : ?>
                          <tr>
                            <?php $length = strlen($material->title); 
                              if($length > 31) : ?>
                            <td><a style="color: black;" target="_blank" href="<?php echo base_url(); ?>Document/show_material/<?php echo $material->id; ?>"><?php echo substr_replace($material->title, "...", 31); ?></a></td>
                            <?php else: ?>
                            <td><a style="color: black;" target="_blank" href="<?php echo base_url(); ?>Document/show_material/<?php echo $material->id; ?>"><?php echo $material->title; ?></a></td>
                            <?php endif; ?>
                            <td>#<?php echo $material->number; ?></td>
                            <?php if($material->is_free == 1) : ?>
                              <td class="text-danger"><b>Free</b></td>
                            <?php else : ?>
                              <td class="text-danger"><b><?php 
                                echo number_format($material->price, '2', '.', ' ') . ' SR'; ?>
                              </b></td>
                            <?php endif; ?>
                            <td><?php echo $material->category_name; ?></td>
                            <?php $length = strlen($material->university_name); 
                              if($length > 15) : ?>
                            <td><?php echo substr_replace($material->university_name, "...", 15); ?></td>
                            <?php else: ?>
                            <td><?php echo $material->university_name; ?></td>
                            <?php endif; ?>
                            <td>
                                <a href="<?php echo base_url(); ?>Dashboard/view_edit_material/<?php echo $material->id; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo base_url(); ?>Dashboard/delete_material/<?php echo $material->id; ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

        <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Material</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h6>Are you sure you want to delete your material?</h6>
        <br>
        <h6>After that you can not go back, are you sure?</h6>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="<?php echo base_url(); ?>Dashboard/delete_material/<?php echo $material->id; ?>" class="btn btn-danger" >Yes, Delete it</a>
        <a href="#" class="btn btn-light" data-dismiss="modal">Close</a>
      </div>

    </div>
  </div>
</div>
    
</body>
</html>