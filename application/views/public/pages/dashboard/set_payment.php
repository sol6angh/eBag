

    <div class="contents bg-light">
        <div class="container mt-4">

            <h3>Set Payment Method</h3>
            <hr>
            <div class="alert alert-warning">
                <strong><i class="fa fa-exclamation-triangle"></i> Warning</strong> Payment information should not be shared with anyone else to avoid fraud. <a href="<?php echo base_url(); ?>Dashboard/view_dashboard/help" style="color: blue; text-decoration: underline;">see instructions</a>
            </div>

            <?php if($this->session->tempdata('error_set_payment')) : ?>
                <div style="color: red;"><?php echo $this->session->tempdata('error_set_payment'); ?></div>
            <?php elseif($this->session->tempdata('error_happend')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_happend'); ?>
                </div>
            <?php elseif($this->session->tempdata('error_insert')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_insert'); ?>
                </div>    
            <?php elseif($this->session->tempdata('api_inserted')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('api_inserted'); ?>
                </div>
            <?php elseif($this->session->tempdata('api_deleted')) : ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('api_deleted'); ?>
                </div>
            <?php elseif($this->session->tempdata('api_updated')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('api_updated'); ?>
                </div>
            <?php endif; ?>

            <?php echo validation_errors(); ?>

            <?php echo form_open(base_url() . 'Dashboard/set_payment'); ?>
                <div class="form-group">
                  <label><h5>Client ID:</h5></label>
                  <input type="text" class="form-control" name="id" placeholder="e.g.   AeXgnf5eDZkbrcFlfNZqB4WT7_aTaN4hWmvshjV4XxJt-TncyvJVOnbFlvgTuXKWFvWSor3H3J3G2pv9" required>
                </div>

                <div class="form-group">
                  <label><h5>Secret Key:</h5></label>
                  <input type="text" class="form-control" name="key" placeholder="e.g.   EDN3dHjeG3WZNG5JQAEsPAmpk8zi2lMat_53yaBgKcW-KC-_CtGU8ig5udZJlFEWLXBVMyyVw3uyfgwV" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                
                <div class="row mt-4">
                    <div class="col-6">
                        <?php if($user->api_activate == 1): ?>
                        <a href="<?php echo base_url(); ?>Dashboard/view_dashboard/edit_set_payment" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i> Delete credential</a>
                        <?php else: ?>

                        <?php endif; ?>
                    </div>
                </div>
                
            </form>
                
        </div>
    </div>

    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Delete Credentials</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h6>Are you sure you want to delete your credentials?</h6>
        <br>
        <h6>This will make you stop recieving your money and make all your previous materials for free to facilitate user experience.</h6>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a href="<?php echo base_url(); ?>Dashboard/delete_api" class="btn btn-danger" >Yes, Delete it</a>
        <a href="#" class="btn btn-light" data-dismiss="modal">Close</a>
      </div>

    </div>
  </div>
</div>
    
</body>
</html>