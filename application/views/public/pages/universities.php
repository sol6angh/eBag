

<?php if(isset($universities_filters)) : ?>   
    <br>
    <div class="container-fluid">
        <div class="row">
        <?php foreach($universities_filters as $university) : ?>
            <div style="margin: 6px 0px 3px 0px;" class="col-4">
                <a href="<?php echo base_url(); ?>Document/get_materials_by_university/<?php echo $university->id; ?>">
                    <img src="<?php echo base_url(); ?>assets/img/<?php echo $university->img; ?>" style="width: 400px; height: 200px; opacity: 0.5; border: 2px solid black; border-radius: 5px;" alt="">
                    <div class="carousel-caption">
                        <h5 style="color: black;"><b><?php echo $university->university_name; ?></b></h5>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    <br>
<?php elseif(isset($no_universities)) : ?>
    <div class="container-fluid">
        <br><br><br><br>
          <div class="row">
              <div class="col-2">
              
              </div>

              <div class="col-8">
                <h2 style="text-align: center;"><?php echo $no_universities; ?></h2>
              </div>

              <div class="col-2">
              
              </div>
          </div>
        </div>
        <br><br><br><br><br>
<?php else : ?>
    <div class="container-fluid mt-2">
        <div class="row">
            <?php foreach($universities as $university): ?>
                <div class="col-4 mt-2">
                    <a href="<?php echo base_url(); ?>Community/view_community/<?php echo $university->id; ?>">
                        <img src="<?php echo base_url(); ?>assets/img/<?php echo $university->img; ?>" style="width: 400px; height: 200px; opacity: 0.5; border: 2px solid black; border-radius: 5px;" alt="">
                        <div class="carousel-caption">
                            <h5 style="color: black;"><b><?php echo $university->university_name; ?></b></h5>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <br>
<?php endif; ?>


