<?php if(isset($not_available)): ?>
        <div class="container-fluid">
        <br><br><br><br>
          <div class="row">
              <div class="col-2">
              
              </div>

              <div class="col-8">
                <h1 style="text-align: center;"><?php echo $not_available; ?></h1>
              </div>

              <div class="col-2">
              
              </div>
          </div>
        </div>
        <br><br><br><br><br>
<?php else: ?>
        <?php if($this->session->tempdata('error_happend')) : ?>
          <div class="container-fluid">
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('error_happend'); ?>, <strong><a href="<?php echo base_url(); ?>User/view_cart/<?php echo $this->session->id; ?>">check from your cart</a></strong>
            </div>
          </div>
        <?php endif; ?>

      <div class="container">
          <div class="row mt-5 mb-5">
              <div class="col-4">
                <img src="<?php echo base_url(); ?>assets/img/users/<?php echo $show->image; ?>" width="320px" height="350px" style="border: 2px black solid;" alt="">
              </div>

              <div class="col-5">
                <span class="card-title" style="font-size: 20px;"><strong><?php echo $show->title; ?></strong></span>
                <span class="badge badge-secondary"><?php echo $show->category_name; ?></span>
                  <span class="badge badge-success" style="font-size: small;"><?php echo $show->faculty_name; ?></span> 
                  <span class="badge badge-primary" style="font-size: small;"><?php echo $show->university_name; ?></span>
                  <p></p>
                  <h6>Material number: <b>#<?php echo $show->number; ?></b></h6>
                  <h6>Published: <b><?php echo $show->uploaded_at; ?></b></h6>
                  <h6>Description:</h6>
                  <p><b><?php echo $show->description; ?></b></p>
                  <h6>Publisher: <a href="<?php echo base_url(); ?>User/view_profile/<?php echo $show->user_id; ?>"><b><?php echo $show->username; ?></b></a></h6>
              </div>

              <div class="col-3">
                    <div class="card mt-2" style="width:260px">
                        <div class="card-body">
                            <h6 class="card-title">Material options</h6>
                            <p class="card-text" style="color: red;"><b><i class="fa fa-exclamation-circle"></i> Disclaimer: We don't encourage any kind of cheating, My e-bag only purpose is to help students in their academic journey.</b></p>
                              <?php if(isset($count)) : ?>
                                <span style="text-align: center;"><i style="color: yellow;" class="fa fa-star"></i> <?php echo $rating; ?>/5 &emsp;(<?php echo $count; ?>) votes</span>
                              <?php else : ?>
                                <span style="text-align: center;"><i style="color: yellow;" class="fa fa-star"></i> 0/5 &emsp;(0) votes</span>
                              <?php endif; ?>
                              <?php $ext = pathinfo($show->file,PATHINFO_EXTENSION); ?>
                              <?php if(isset($this->session->id)): ?>
                                
                                  <?php if($show->is_free == 1) : ?>
                                    <h5 class="card-text text-danger"><br>Free</h5>
                                    <?php if($show->user_id == $this->session->id): ?>
                                      <?php if($ext !== 'pdf'): ?>
                                        <button id="got_it" class="btn btn-secondary btn-block">Your own</button>
                                      <?php else: ?>
                                        <a href="<?php echo base_url(); ?>assets/files/<?php echo $show->file; ?>" type="application/pdf" target="_blank" class="btn btn-info btn-block"><i class="fa fa-file-pdf-o"></i> View</a>
                                        <button id="got_it" class="btn btn-secondary btn-block">Your own</button>
                                      <?php endif; ?>
                                    <?php else: ?>
                                      <?php if(isset($material_in_bag)): ?>
                                        <button id="got_it" class="btn btn-secondary btn-block">Got it</button>
                                      <?php else: ?>
                                        <?php if($ext !== 'pdf'): ?>
                                          <a href="<?php echo base_url(); ?>User/add_to_bag/<?php echo $show->id; ?>" class="btn btn-dark btn-block">Get Now</a>
                                        <?php else: ?>
                                          <a href="<?php echo base_url(); ?>assets/files/<?php echo $show->file; ?>" type="application/pdf" target="_blank" class="btn btn-info btn-block"><i class="fa fa-file-pdf-o"></i> View</a>
                                          <a href="<?php echo base_url(); ?>User/add_to_bag/<?php echo $show->id; ?>" class="btn btn-dark btn-block">Get Now</a>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; ?>

                                  <?php else : ?>
                                    <h5 class="card-text text-danger"><br>
                                    <?php echo number_format($show->price, '2', '.', ' ') . ' SR';?>
                                    </h5>
                                    <?php if(isset($material_in_bag)): ?>
                                      <button id="got_it" class="btn btn-secondary btn-block">Bought it</button>
                                    <?php else: ?>
                                      <?php if($show->user_id == $this->session->id): ?>
                                        <?php if($ext !== 'pdf'): ?>
                                          <button id="got_it" class="btn btn-secondary btn-block">Your own</button>
                                        <?php else: ?>
                                          <a href="<?php echo base_url(); ?>assets/files/<?php echo $show->file; ?>" type="application/pdf" target="_blank" class="btn btn-info btn-block"><i class="fa fa-file-pdf-o"></i> View</a>
                                          <button id="got_it" class="btn btn-secondary btn-block">Your own</button>
                                        <?php endif; ?>
                                      <?php else: ?>
                                        <form action="<?php echo base_url(); ?>User/add_to_bag/<?php echo $show->id; ?>" method="post">
                                          <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-paypal"></i> Buy Now</button>
                                        </form>
                                      <?php endif; ?>
                                    <?php endif; ?>
                        
                                  <?php endif; ?>
                                
                              
                              <?php else: ?>

                                <?php if($show->is_free == 1) : ?>
                                  <h5 class="card-text text-danger"><br>Free</h5>
                                  <?php if(isset($material_in_bag)): ?>
                                    <button id="got_it" class="btn btn-secondary btn-block">Got it</button>
                                  <?php else: ?>
                                    <?php if($ext !== 'pdf'): ?>
                                          <a href="<?php echo base_url(); ?>User/add_to_bag/<?php echo $show->id; ?>" class="btn btn-dark btn-block">Get Now</a>
                                        <?php else: ?>
                                          <a href="<?php echo base_url(); ?>assets/files/<?php echo $show->file; ?>" type="application/pdf" target="_blank" class="btn btn-info btn-block"><i class="fa fa-file-pdf-o"></i> View</a>
                                          <a href="<?php echo base_url(); ?>User/add_to_bag/<?php echo $show->id; ?>" class="btn btn-dark btn-block">Get Now</a>
                                        <?php endif; ?>
                                  <?php endif; ?>
                                <?php else : ?>
                                  <h5 class="card-text text-danger"><br>
                                  <?php echo number_format($show->price, '2', '.', ' ') . ' SR';?>
                                  </h5>
                                  <?php if(isset($material_in_bag)): ?>
                                    <button id="got_it" class="btn btn-secondary btn-block">Bought it</button>
                                  <?php else: ?>
                                    <form action="<?php echo base_url(); ?>User/add_to_bag/<?php echo $show->id; ?>" method="post">
                                      <button type="submit" class="btn btn-dark btn-block"><i class="fa fa-paypal"></i> Buy Now</button>
                                    </form>
                                  <?php endif; ?>
                      
                                <?php endif; ?>

                              <?php endif; ?>
                        </div>
                    </div>
              </div>
          </div>
        <?php if($comments) : ?>
            <div class="row">
                <div class="col">
                  <h4>Comments <i class="fa fa-comments"></i></h4>
                  <hr>
          <?php foreach($comments as $comment) : ?>
                  <div class="bubble">
                    <p><?php echo $comment->comment; ?></p>
                    By: <strong><a href="<?php echo base_url(); ?>User/view_profile/<?php echo $comment->user_id; ?>"><?php echo $comment->username; ?></a></strong> on: <?php echo $comment->created_at; ?>
                  </div>
          <?php endforeach; ?>
                </div>
            </div>
            <?php if($this->session->logged_in) : ?>
                    <hr>
                    <div class="row">
                        <div class="col">
                          <h4>Add comment</h4>
                          <div><?php echo validation_errors(); ?></div>
                          <?php echo form_open(base_url() . 'User/add_comment'); ?>
                            <div class="form-group">
                              <textarea name="comment" class="form-control"></textarea>
                            </div>
                              <input type="hidden" name="user_id" value="<?php echo $this->session->id; ?>">
                              <input type="hidden" name="document_id" value="<?php echo $show->id; ?>">
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Add Comment</button>
                            </div>
                          </form>
                        </div>
                    </div>
                  </div>
            <?php else: ?>
              <hr>
                    <div class="row">
                        <div class="col-4">
                          <h4>Add comment</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        
                        <div class="col">
                            <h5 style="text-align: center;"><a href="<?php echo base_url(); ?>View/view_pages/login">Please login to your account, to write your feedback.</a></h5>
                        </div>
                        
                    </div>
                  </div>
                  <br><br><br>
            <?php endif; ?>

        <?php else : ?>
        <br><br><br>
            <div class="row">
                <div class="col">
                    <h4>Comments <i class="fa fa-comments"></i></h4>
                    <hr>
                    <h5 style="text-align: center;">There are no comments on this material. Be the first one.</h5>
                </div>
            </div>
        <br><br><br>
        <?php if($this->session->logged_in) : ?>
          <hr>
                    <div class="row">
                        <div class="col">
                          <h4>Add comment</h4>
                          <div><?php echo validation_errors(); ?></div>
                          <?php echo form_open(base_url() . 'User/add_comment'); ?>
                            <div class="form-group">
                              <textarea name="comment" class="form-control"></textarea>
                            </div>
                              <input type="hidden" name="user_id" value="<?php echo $this->session->id; ?>">
                              <input type="hidden" name="document_id" value="<?php echo $show->id; ?>">
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Add Comment</button>
                            </div>
                          </form>
                        </div>
                    </div>
                  </div>
            <?php else: ?>
              <hr>
                    <div class="row">
                        <div class="col-4">
                          <h4>Add comment</h4>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        
                        <div class="col">
                        <h5 style="text-align: center;"><a href="<?php echo base_url(); ?>View/view_pages/login">Please login to your account, to write your feedback.</a></h5>
                        </div>
                        
                    </div>
                  </div>
                  <br><br><br>
            <?php endif; ?>
        <?php endif; ?>

<script>
    document.getElementById("got_it").disabled=true;
</script>       
<?php endif; ?>    

      

