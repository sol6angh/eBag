
<?php if(isset($materials)) : ?>
        <?php if($this->session->tempdata('cart_message')) : ?>
          <div class="container-fluid">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('cart_message'); ?>, <strong><a href="<?php echo base_url(); ?>User/view_cart/<?php echo $this->session->id; ?>">go to your cart</a></strong>
            </div>
          </div>
        <?php elseif($this->session->tempdata('check_cart_message')) : ?>
          <div class="container-fluid">
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo $this->session->tempdata('check_cart_message'); ?>, <strong><a href="<?php echo base_url(); ?>User/view_cart/<?php echo $this->session->id; ?>">check from your cart</a></strong>
            </div>
          </div>
        <?php endif; ?>
      <div class="container-fluid">
        <h2 class="mt-4" style="text-align: center;"><?php echo $heading; ?></h2>
          <div class="row ml-2 mt-2">
          <?php foreach($materials as $material) : ?>
            <div class="col-4 ">
              <div class="mt-2" style="width:370px; border: 1px solid black; border-radius: 5px;">
                  <h6 class="container-fluid" style="text-align: center; color: white; background-color: black;">#<a href="show_material/<?php echo $material->id; ?>" style="color: white;"><?php echo $material->number; ?></a></h6>
                  <div class="card-body">
                      <span class="card-title"><a href="<?php echo base_url(); ?>Document/show_material/<?php echo $material->id; ?>" style="font-size: 20px;"><strong><?php echo $material->title; ?>. </strong></a></span>
                      <span class="badge badge-secondary"><?php echo $material->category_name; ?></span>
                      <p class="card-text"><?php echo $material->description; ?>.</p>
                      <?php if($material->is_free == 1) : ?>
                        <h5 class="card-text text-danger">Free</h5>
                      <?php else : ?>
                        <h5 class="card-text text-danger"><?php 
                          echo number_format($material->price, '2', '.', ' ') . ' SR'; ?></h5>
                      <?php endif; ?>
                      <p class="card-text"><strong>Collage: </strong><span class="badge badge-success" style="font-size: small;"><?php echo $material->faculty_name; ?></span></p>
                      <p class="card-text"><strong>University: </strong><span class="badge badge-primary" style="font-size: small;"><?php echo $material->university_name; ?></span></p>
                          <hr>
                          <form action="<?php echo base_url(); ?>Document/show_material/<?php echo $material->id; ?>" method="post">
                            <button type="submit" class="btn btn-success btn-block">View</button>
                          </form>
                  </div>
              </div>
            </div>
          <?php endforeach; ?>
         </div>
         </div>
         <br><br>
<?php elseif (isset($search_number)) : ?>
  <div class="container-fluid">
        <h2 class="mt-4" style="text-align: center;">Search By Material Number <?php echo $heading; ?></h2>
          <div class="row ml-2 mt-2">
            <div class="col-4 ">
              <div class="mt-2" style="width:370px; border: 1px solid black; border-radius: 5px;">
                  <h6 class="container-fluid" style="text-align: center; color: white; background-color: black;">#<a href="show_material/<?php echo $search_number->id; ?>" style="color: white;"><?php echo $search_number->number; ?></a></h6>
                  <div class="card-body">
                      <span class="card-title"><a href="<?php echo base_url(); ?>Document/show_material/<?php echo $search_number->id; ?>" style="font-size: 20px;"><strong><?php echo $search_number->title; ?>. </strong></a></span>
                      <span class="badge badge-secondary"><?php echo $search_number->category_name; ?></span>
                      <p class="card-text"><?php echo $search_number->description; ?>.</p>
                      <?php if($search_number->is_free == 1) : ?>
                        <h5 class="card-text text-danger">Free</h5>
                      <?php else : ?>
                        <h5 class="card-text text-danger"><?php 
                          echo number_format($search_number->price, '2', '.', ' ') . ' SR'; ?></h5>
                      <?php endif; ?>
                      <p class="card-text"><strong>Collage: </strong><span class="badge badge-success" style="font-size: small;"><?php echo $search_number->faculty_name; ?></span></p>
                      <p class="card-text"><strong>University: </strong><span class="badge badge-primary" style="font-size: small;"><?php echo $search_number->university_name; ?></span></p>
                          <hr>
                        
                          <a href="<?php echo base_url(); ?>Document/show_material/<?php echo $search_number->id; ?>" class="btn btn-success btn-block">View</a>
                  </div>
              </div>
            </div>
         </div>
         </div>
         <br><br>
<?php elseif(isset($no_materials)) : ?>
        <div class="container-fluid">
        <br><br><br><br>
          <div class="row">
              <div class="col-2">
              
              </div>

              <div class="col-8">
                <h2 style="text-align: center;"><?php echo $no_materials; ?></h2>
              </div>

              <div class="col-2">
              
              </div>
          </div>
        </div>
        <br><br><br><br><br>
<?php elseif(isset($no_search_number)) : ?>
  <div class="container-fluid">
        <br><br><br><br>
          <div class="row">
              <div class="col-2">
              
              </div>

              <div class="col-8">
                <h2 style="text-align: center;"><?php echo $no_search_number; ?></h2>
              </div>

              <div class="col-2">
              
              </div>
          </div>
        </div>
        <br><br><br><br><br>
<?php elseif(isset($materials_university)) : ?>
  <div class="container-fluid">
        <h2 class="mt-4" style="text-align: center;">All Materials Related to "<?php echo $university->university_name; ?>"</h2>
          <div class="row ml-2 mt-2">
          <?php foreach($materials_university as $material) : ?>
            <div class="col-4 ">
              <div class="mt-2" style="width:370px; border: 1px solid black; border-radius: 5px;">
                  <h6 class="container-fluid" style="text-align: center; color: white; background-color: black;">#<a href="show_material/<?php echo $material->id; ?>" style="color: white;"><?php echo $material->number; ?></a></h6>
                  <div class="card-body">
                      <span class="card-title"><a href="<?php echo base_url(); ?>Document/show_material/<?php echo $material->id; ?>" style="font-size: 20px;"><strong><?php echo $material->title; ?>. </strong></a></span>
                      <span class="badge badge-secondary"><?php echo $material->category_name; ?></span>
                      <p class="card-text"><?php echo $material->description; ?>.</p>
                      <?php if($material->is_free == 1) : ?>
                        <h5 class="card-text text-danger">Free</h5>
                      <?php else : ?>
                        <h5 class="card-text text-danger"><?php 
                          echo number_format($material->price, '2', '.', ' ') . ' SR'; ?></h5>
                      <?php endif; ?>
                      <p class="card-text"><strong>Collage: </strong><span class="badge badge-success" style="font-size: small;"><?php echo $material->faculty_name; ?></span></p>
                      <p class="card-text"><strong>University: </strong><span class="badge badge-primary" style="font-size: small;"><?php echo $material->university_name; ?></span></p>
                          <hr>
                          <a href="<?php echo base_url(); ?>Document/show_material/<?php echo $material->id; ?>" class="btn btn-success btn-block">View</a>
                  </div>
              </div>
            </div>
          <?php endforeach; ?>
         </div>
         </div>
         <br><br>
<?php elseif(isset($no_materials_university)) : ?>
  <div class="container-fluid">
        <br><br><br><br>
          <div class="row">
              <div class="col-1">
              
              </div>

              <div class="col-10">
                <h2 style="text-align: center;">There are no any materials related to "<?php echo $university->university_name; ?>"</h2>
              </div>

              <div class="col-1">
              
              </div>
          </div>
        </div>
        <br><br><br><br><br>
<?php elseif(isset($search_materials)) : ?>
  <?php $search_info = $_SESSION['search'];

      $count = count($search_info);

  ?>
  <div class="container-fluid">
        <h2 class="mt-4" style="text-align: center;">Search for Materials related to keyword "<?php echo $keyword; ?>"</h2>
          <div class="row ml-2 mt-2">
          <?php for ($i=0; $i < $count; $i++): ?>
            <div class="col-4 ">
              <div class="mt-2" style="width:370px; border: 1px solid black; border-radius: 5px;">
                  <h6 class="container-fluid" style="text-align: center; color: white; background-color: black;">#<a href="<?php echo base_url(); ?>Document/show_material/<?php echo $search_info[$i][0]->id; ?>" style="color: white;"><?php echo $search_info[$i][0]->number; ?></a></h6>
                  <div class="card-body">
                      <span class="card-title"><a href="<?php echo base_url(); ?>Document/show_material/<?php echo $search_info[$i][0]->id; ?>" style="font-size: 20px;"><strong><?php echo $search_info[$i][0]->title; ?>. </strong></a></span>
                      <span class="badge badge-secondary"><?php echo $search_info[$i][0]->category_name; ?></span>
                      <p class="card-text"><?php echo $search_info[$i][0]->description; ?>.</p>
                      <?php if($search_info[$i][0]->is_free == 1) : ?>
                        <h5 class="card-text text-danger">Free</h5>
                      <?php else : ?>
                        <h5 class="card-text text-danger"><?php 
                          echo number_format($search_info[$i][0]->price, '2', '.', ' ') . ' SR'; ?></h5>
                      <?php endif; ?>
                      <p class="card-text"><strong>Collage: </strong><span class="badge badge-success" style="font-size: small;"><?php echo $search_info[$i][0]->faculty_name; ?></span></p>
                      <p class="card-text"><strong>University: </strong><span class="badge badge-primary" style="font-size: small;"><?php echo $search_info[$i][0]->university_name; ?></span></p>
                          <hr>
                          <a href="<?php echo base_url(); ?>Document/show_material/<?php echo $search_info[$i][0]->id; ?>" class="btn btn-success btn-block">View</a>
                  </div>
              </div>
            </div>
          <?php endfor; ?>
         </div>
         </div>
         <br><br>
<?php elseif(isset($no_search_materials)) : ?>
  <div class="container-fluid">
        <br><br><br><br>
          <div class="row">
              <div class="col-1">
              
              </div>

              <div class="col-10">
                <h2 style="text-align: center;"><?php echo $no_search_materials; ?></h2>
              </div>

              <div class="col-1">
              
              </div>
          </div>
        </div>
        <br><br><br><br><br>
<?php elseif(isset($faculty_materials)) : ?>
  <div class="container-fluid">
        <h2 class="mt-4" style="text-align: center;">Materials related to "<?php echo $faculty->faculty_name; ?>"</h2><h2 style="text-align: center;"> in "<?php echo $university->university_name; ?>"</h2>
          <div class="row ml-2 mt-2">
          <?php foreach($faculty_materials as $material) : ?>
            <div class="col-4 ">
              <div class="mt-2" style="width:370px; border: 1px solid black; border-radius: 5px;">
                  <h6 class="container-fluid" style="text-align: center; color: white; background-color: black;">#<a href="show_material/<?php echo $material->id; ?>" style="color: white;"><?php echo $material->number; ?></a></h6>
                  <div class="card-body">
                      <span class="card-title"><a href="<?php echo base_url(); ?>Document/show_material/<?php echo $material->id; ?>" style="font-size: 20px;"><strong><?php echo $material->title; ?>. </strong></a></span>
                      <span class="badge badge-secondary"><?php echo $material->category_name; ?></span>
                      <p class="card-text"><?php echo $material->description; ?>.</p>
                      <?php if($material->is_free == 1) : ?>
                        <h5 class="card-text text-danger">Free</h5>
                      <?php else : ?>
                        <h5 class="card-text text-danger"><?php 
                          echo number_format($material->price, '2', '.', ' ') . ' SR'; ?></h5>
                      <?php endif; ?>
                      <p class="card-text"><strong>Collage: </strong><span class="badge badge-success" style="font-size: small;"><?php echo $material->faculty_name; ?></span></p>
                      <p class="card-text"><strong>University: </strong><span class="badge badge-primary" style="font-size: small;"><?php echo $material->university_name; ?></span></p>
                          <hr>
                          <a href="<?php echo base_url(); ?>Document/show_material/<?php echo $material->id; ?>" class="btn btn-success btn-block">View</a>
                  </div>
              </div>
            </div>
          <?php endforeach; ?>
         </div>
         </div>
         <br><br>
<?php elseif(isset($no_faculty)) : ?>
  <div class="container-fluid">
        <br><br><br><br>
          <div class="row">
              <div class="col-1">
              
              </div>

              <div class="col-10">
                <h2 style="text-align: center;">There are no any materials related to "<?php echo $no_faculty->faculty_name; ?>" in "<?php echo $university->university_name; ?>"</h2>
              </div>

              <div class="col-1">
              
              </div>
          </div>
        </div>
        <br><br><br><br><br>
<?php endif; ?>