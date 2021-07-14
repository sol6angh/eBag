<?php if($this->session->tempdata('error_rating')) : ?>
          <div class="container-fluid">
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('error_rating'); ?>
            </div>
          </div>
<?php elseif($this->session->tempdata('rating_inserted')) : ?>
          <div class="container-fluid">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('rating_inserted'); ?>
            </div>
          </div>
<?php elseif($this->session->tempdata('material_inserted')) : ?>
          <div class="container-fluid">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('material_inserted'); ?>
            </div>
          </div>
<?php endif; ?>

<?php if(isset($items)) : ?>
 <div class="container-fluid mt-4">
        <h2>My Bag <i class="fa fa-shopping-bag" style="font-size:30px; color: black;"></i></h2>
        <h6>You will find here all materials that you bought it</h6>
        <div class="row">
            <div class="col">
                <div class="mt-3">
                    <div class="container">
                      <?php foreach($items as $item) : ?>
                        <div class="row">
                            <div class="col-3" style="border: 1px solid black; border-radius: 5px;">
                                <img src="<?php echo base_url(); ?>assets/img/users/<?php echo $item->image; ?>" style="margin: 70px 0px 0px 0px;" width="250px" height="250px" alt="">
                            </div>
                            &nbsp;
                            <div class="col-8" style="border: 1px solid black; border-radius: 5px;">
                                <div class="card-body">
                                    <h3 class="card-title"><a href="<?php echo base_url(); ?>Document/show_material/<?php echo $item->id; ?>"><b><?php echo $item->title; ?></b></a> <div class="badge badge-secondary" style="font-size: small;"><?php echo $item->category_name; ?></div></h3>
                                    <span class="badge badge-success" style="font-size: small;"><?php echo $item->faculty_name; ?></span> <span class="badge badge-primary" style="font-size: small;"><?php echo $item->university_name; ?></span>
                                    <h6>Material number: <b>#<?php echo $item->number; ?></b></h6>
                                    <p class="card-text"><?php echo $item->description; ?></p>
                                    <div><b><?php echo $item->uploaded_at; ?></b></div>
                                    <?php $ext = pathinfo($item->file,PATHINFO_EXTENSION); ?>
                                    <?php if($ext !== 'pdf'): ?>
                                      <div><a download="<?php echo $item->file; ?>" href="<?php echo base_url(); ?>assets/files/<?php echo $item->file; ?>" style="margin-left: 560px;" class="btn btn-outline-primary"><i class="fa fa-download"></i> Download</a></div>
                                    <?php else: ?>
                                      <div><i class="fa fa-user" style="font-size:15px; color: black;"></i><a href="<?php echo base_url(); ?>User/view_profile/<?php echo $item->user_id; ?>"> <?php echo $item->username; ?></a><a href="<?php echo base_url(); ?>assets/files/<?php echo $item->file; ?>" target="_blank" style="margin-left: 380px;" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> View file</a> <a download="<?php echo $item->file; ?>" href="<?php echo base_url(); ?>assets/files/<?php echo $item->file; ?>" class="btn btn-outline-primary"><i class="fa fa-download"></i> Download</a></div>
                                    <?php endif; ?>
                                <?php if($item->is_deleted == 1): ?>

                                <?php else: ?>
                                  <?php if($item->is_rating == 0) : ?>
                                    <div><b>Rate material</b>
                                      <form action="<?php echo base_url(); ?>User/add_rating/<?php echo $this->session->id; ?>" method="post">
                                        <select name="rating">
                                          <option value="0">-Select-</option>
                                          <option value="5">5 out of 5</i></option>
                                          <option value="4">4 out of 5</option>
                                          <option value="3">3 out of 5</option>
                                          <option value="2">2 out of 5</option>
                                          <option value="1">1 out of 5</option>
                                        </select>
                                        <input type="hidden" name="document_id" value="<?php echo $item->id; ?>">
                                        <button type="submit" class="btn btn-info btn-sm" style="margin-bottom: 5px;">Rate</button>
                                      </form>
                                    </div>
                                  <?php else: ?>
                                    <div>You rate this material before</div>
                                  <?php endif; ?>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                      <?php endforeach; ?>
                    </div> 
                </div>
            </div>
        </div>
</div>
   
<br><br>      

<?php else: ?>
  <div class="container-fluid mt-4">
        <h2>My Bag <i class="fa fa-shopping-bag" style="font-size:30px; color: black;"></i></h2>
        <h6>You will find here all materials that you bought it</h6>
      <br><br><br><br><br>
          <div class="row">
              <div class="col-1">
              
              </div>

              <div class="col-10">
                <h2 style="text-align: center;"><?php echo $no_items; ?></h2>
              </div>

              <div class="col-1">
              
              </div>
          </div>
        <br><br><br><br><br><br><br>
      </div>
<?php endif; ?>