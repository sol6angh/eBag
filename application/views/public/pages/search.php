<?php if(!isset($universities)) :?>
<?php redirect(base_url() . 'View/view_pages/search');?>
<?php else: ?>
    <br>
    <h4 class="mt-4" style="text-align: center;">Find your material by filtering all matrial that you want</h4>

    <div class="container">
      <div class="row mt-5">
        <div class="col-4">
        <span style="color: red;"><?php echo validation_errors(); ?></span>
        <?php echo form_open(base_url() . 'Document/search_by_number'); ?>
            <h5>Search by material number:</h5>
              <input type="text" name="material_num" class="form-control" placeholder="#8234">
            <button type="submit" class="btn btn-primary btn-block mt-2"><i class="fa fa-search"></i> Search</button>
          </form>
        </div>

        <div class="col-2">

        </div>


    <?php if(isset($faculties)) : ?>
            <div class="col-5">
              <form action="<?php echo base_url(); ?>Document/get_materials_based_on_faculty" method="POST">
                <div class="form-group">
                  <h5>Select your university</h5>
                  <select class="form-control" name="select_university">
                    <option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
                  </select>
                </div>

                <div class="form-group">
                  <h5>Select your faculty</h5>
                  <select class="form-control" name="select_faculty">
                  <?php foreach($faculties as $faculty) : ?>
                    <option value="<?php echo $faculty->id; ?>"><?php echo $faculty->faculty_name; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>

                <button class="btn btn-dark btn-block mt-2"><i class="fa fa-filter"></i> Apply</button>
              </form>
            </div>

            </div>
        </div>
        <br><br>
    <?php else : ?>
      <div class="col-5">
              <form action="<?php echo base_url(); ?>Community/get_faculties_based_on_university" method="POST">
                <div class="form-group">
                  <h5>Select your university</h5>
                  <?php if($this->session->tempdata('no_select_university')) : ?>
                    <span style="color: red;"><?php echo $this->session->tempdata('no_select_university'); ?></span>
                  <?php endif; ?>
                  <select class="form-control" name="select_university">
                    <option value="0">-Select-</option>
                  <?php foreach($universities as $university) : ?>
                    <option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
                  <?php endforeach; ?>
                  </select>
                </div>
                <button class="btn btn-primary btn-block mt-2">Select</button>
              </form>
            </div>
                  <br>
                
          </div>
        </div>

        <br><br>
    <?php endif; ?>

<?php endif; ?>

        
