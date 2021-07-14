<?php if(isset($faculties)): ?>

    <div class="contents bg-light">
        <div class="container mt-3">
            <h3>Add Material</h3>
            <hr>
            <?php if($this->session->tempdata('error_insert_material')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_insert_material'); ?>
                </div>
            <?php elseif($this->session->tempdata('error_set_api')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_set_api'); ?>
                </div>
            <?php elseif($this->session->tempdata('error_file_upload')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_file_upload'); ?>
                </div>
            <?php elseif($this->session->tempdata('error_happend')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_happend'); ?>
                </div>
            <?php elseif($this->session->tempdata('error_file_extension')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_file_extension'); ?>
                </div>
            <?php elseif($this->session->tempdata('error_file_size')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_file_size'); ?>
                </div>
            <?php elseif($this->session->tempdata('error_image_size')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_image_size'); ?>
                </div>
            <?php elseif($this->session->tempdata('error_image_extension')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_image_extension'); ?>
                </div>
            <?php elseif($this->session->tempdata('error_set_fees')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_set_fees'); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo base_url(); ?>Dashboard/add_material" method="POST" enctype="multipart/form-data">

                <div class="row mt-3">
                        <div class="col-6">
                            <h6><span style="color: red;">*</span> Select your university:</h6>
                            <select name="select_university" class="form-control">
                                <option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
                            </select>
                        </div>

                        <div class="col-6">
                            <h6><span style="color: red;">*</span> Select your faculty:</h6>
                            <select name="select_faculty" class="form-control">
                            <?php foreach($faculties as $faculty): ?>
                                <option value="<?php echo $faculty->id; ?>"><?php echo $faculty->faculty_name; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <h6><span style="color: red;">*</span> Material Name:</h6>
                        <input name="title" type="text" class="form-control" required>
                    </div>

                    <div class="col-6">
                        <h6>Upload Main Image:</h6>
                        <p style="color: red;"> only for .jpg , .jpeg ,and .png</p>
                        <input name="image" type="file" class="form-control-file border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <h6><span style="color: red;">*</span> Material Description:</h6>
                        <textarea name="description" cols="30" rows="4" class="form-control" required></textarea>
                    </div>

                    <div class="col-6">
                        <h6><span style="color: red;">*</span> Upload Material File:</h6>
                        <p style="color: red;">the file should be end with .PDF , .ZIP or .RAR</p>
                        <input name="file" type="file" class="form-control-file border" required>
                    </div>
                </div>

                <div class="row mt-3">
                        <div class="col-6">
                            <h6><span style="color: red;">*</span> Select Category:</h6>
                            <select name="select_category" class="form-control">
                            <?php foreach($categories as $category): ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
                            <?php endforeach; ?>
                              </select>
                        </div>

                        <div class="col-6">
                            <h6><span style="color: red;">*</span> Set your cost:</h6>
                            <div class="form-check-inline">
                                  <input id="free" onclick="func();" type="radio" name="set_payment" value="free" class="form-check-input" checked>is Free
                            </div>
                            <div class="form-check-inline">
                                  <input id="fees" onclick="func();" type="radio" name="set_payment" value="fees" class="form-check-input">with Fees
                                  <br>
                                  <span id="target_label"></span>
                            </div>
                        </div>
                    </div>


                    
                    <div class="row mt-3">

                        <div class="col-6">
                        
                        </div>
                        <div class="col-1">
                                <button type="submit" class="btn btn-primary">Done</button>
                        </div>

                        <div class="col-5">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

<?php else: ?>
    <div class="contents bg-light">
        <div class="container mt-3">
            <h3>Add Material</h3>
            <hr>
                <div class="row mt-3">
                        <div class="col-6">
                            <form action="<?php echo base_url(); ?>Community/get_faculties_based_on_university" method="post">
                            <?php if($this->session->tempdata('no_select_university')) : ?>
                                <div style="color: red;"><?php echo $this->session->tempdata('no_select_university'); ?></div>
                            <?php endif; ?>
                            <h6><span style="color: red;">*</span> Select University first:</h6>
                            <select name="select_university" class="form-control">
                            <option checked>-Select-</option>
                            <?php foreach($universities as $university): ?>
                                <option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
                            <?php endforeach; ?>
                            </select>
                            <input type="hidden" name="add_material_mode" value="true">
                        </div>
                </div>

                <div class="row mt-3">
                        <div class="col-6">
                            <button type="submit" class="btn btn-dark btn-block">Select University</button>
                            </form>
                        </div>
                </div>
                 
            </form>
        </div>
    </div>
<?php endif; ?>
</body>
</html>

                            <script>
                                function func(){
                                    var fees_handler = document.getElementById("fees");
                                    var free_handler = document.getElementById("free");
                            
                                    if(fees_handler.checked){
                            
                                        var new_input = document.createElement("input");
                                        new_input.setAttribute("type","text");
                                        new_input.setAttribute("name","enter_fees");
                                        new_input.setAttribute("id","new_label");
                                        new_input.setAttribute("placeholder","Enter Your Fees");
                            
                                        var target = document.getElementById("target_label");
                                        target.appendChild(new_input);
                                        document.getElementById("fees").disabled=true;
                            
                                    }else if(free_handler.checked){
                            
                                        var target = document.getElementById("target_label");
                                        var input_handler = document.getElementById("new_label");
                                        target.removeChild(input_handler);
                                        document.getElementById("fees").disabled=false;
                                    }
                                }
                            </script>