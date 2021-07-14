<?php if(isset($faculties)): ?>

    <div class="contents bg-light">
        <div class="container mt-3">
            <h3>Edit Material</h3>
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
            <?php elseif($this->session->tempdata('error_update_material')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_set_api'); ?>
                </div>
            <?php elseif($this->session->tempdata('error_happend')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $this->session->tempdata('error_happend'); ?>
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
            <?php echo form_open_multipart(base_url() . 'Dashboard/edit_material/' . $my_material->id); ?>

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
                        <input name="title" type="text" class="form-control" value="<?php echo $this->session->title; ?>" required>
                    </div>

                    <div class="col-6">
                        <h6>Upload New Main Image:</h6>
                        <p style="color: red;"> only for .jpg , .jpeg ,and .png</p>
                        <input name="image" type="file" class="form-control-file border">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <h6><span style="color: red;">*</span> Material Description:</h6>
                        <textarea name="description" cols="30" rows="4" class="form-control" required><?php echo $this->session->description; ?></textarea>
                    </div>

                    <div class="col-6">
                        <h6><span style="color: red;">*</span> Set your new cost:</h6>
                        <?php if($my_material->is_free == 1): ?>
                            <div class="form-check-inline">
                                  <input id="free" onclick="func();" type="radio" name="set_payment" value="free" class="form-check-input" checked>is Free
                            </div>
                            <div class="form-check-inline">
                                  <input id="fees" onclick="func();" type="radio" name="set_payment" value="fees" class="form-check-input">with Fees
                                  <br>
                                  <span id="target_label"></span>
                            </div>
                        <?php else: ?>
                            <div class="form-check-inline">
                                  <input id="free2" onclick="func2();" type="radio" name="set_payment" value="free" class="form-check-input">is Free
                            </div>
                            <div class="form-check-inline">
                                  <input id="fees2" onclick="func2();" type="radio" name="set_payment" value="fees" class="form-check-input" checked>with Fees
                                  <br>
                                  <span id="target_label"><input type="text" name="enter_fees" id="new_label" value="<?php echo $my_material->price; ?>"></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row mt-3">
                        <div class="col-6">
                            <h6><span style="color: red;">*</span> Select New Category:</h6>
                            <select name="select_category" class="form-control">
                                <option value="<?php echo $my_category->id; ?>"><?php echo $my_category->category_name; ?></option>
                            <?php foreach($categories as $category): ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
                            <?php endforeach; ?>
                              </select>
                        </div>

                        <div class="col-2">
                            <br>
                            <button type="submit" class="btn btn-success btn-block">Save changes</button>
                        </div>

                        <div class="col-4">
                            <br>
                            <a href="<?php echo base_url(); ?>Dashboard/view_edit_material/<?php echo $this->session->document_id; ?>" class="btn btn-secondary">Reset</a>
                        </div>
                    </div>

                            <script>
                                document.getElementById("fees2").disabled=true;
                            </script>

                    
                    <div class="row mt-3">

                        <div class="col-6">
                        
                        </div>
                        
                    </div>
            </form>
        </div>
    </div>

<?php else: ?>
    <div class="contents bg-light">
        <div class="container mt-3">
            <h3>Edit Material</h3>
            <hr>
            <form action="<?php echo base_url(); ?>Community/get_faculties_based_on_university" method="post">

                <div class="row mt-3">
                        <div class="col-6">
                        <?php if($this->session->tempdata('no_select_university')) : ?>
                                <div style="color: red;"><?php echo $this->session->tempdata('no_select_university'); ?></div>
                        <?php endif; ?>
                            <h6><span style="color: red;">*</span> Select your university:</h6>
                            <select name="select_university" class="form-control">
                                <option value="0">-Select-</option>
                            <?php foreach($universities as $university): ?>
                                <option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-2">
                        <br>
                            <button type="submit" class="btn btn-dark btn-block">Select</button>
                        </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <h6><span style="color: red;">*</span> Material Name:</h6>
                        <input name="title" type="text" class="form-control" value="<?php echo $my_material->title; ?>" required>
                    </div>

                    <div class="col-6">
                        <input type="hidden" name="edit_material_mode" value="true">
                        <input type="hidden" name="document_id" value="<?php echo $my_material->id; ?>">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <h6><span style="color: red;">*</span> Material Description:</h6>
                        <textarea name="description" cols="30" rows="4" class="form-control" required><?php echo $my_material->description; ?></textarea>
                    </div>

                    <div class="col-6">
                        
                    </div>
                </div>

                <div class="row mt-3">
                        <div class="col-6">
                            <h6><span style="color: red;">*</span> Select New Category:</h6>
                            <select name="select_category" class="form-control">
                                <option value="<?php echo $my_material->category_id; ?>"><?php echo $my_material->category_name; ?></option>
                            <?php foreach($categories as $category): ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
                            <?php endforeach; ?>
                              </select>
                        </div>

                        <div class="col-2">
                            <br>
                            <button type="submit" id="save_changes_before" class="btn btn-success btn-block">Save changes</button>
                        </div>
                    </div>


                    
                    <div class="row mt-3">

                        <div class="col-6">
                        
                        </div>
                        <div class="col-2">
                                
                        </div>

                    </div>
            </form>
        </div>
    </div>
<?php endif; ?>
</body>
</html>


<script>

                                document.getElementById("save_changes_before").disabled=true;

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

                                function func2(){
                                    var fees_handler = document.getElementById("fees2");
                                    var free_handler = document.getElementById("free2");
                            
                                    if(fees_handler.checked){
                            
                                        var new_input = document.createElement("input");
                                        new_input.setAttribute("type","text");
                                        new_input.setAttribute("name","enter_fees");
                                        new_input.setAttribute("id","new_label");
                                        new_input.setAttribute("placeholder","Enter Your Fees");
                                        new_input.setAttribute("value","<?php echo $my_material->price; ?>");
                            
                                        var target = document.getElementById("target_label");
                                        target.appendChild(new_input);
                                        document.getElementById("fees2").disabled=true;
                            
                                    }else if(free_handler.checked){
                            
                                        var target = document.getElementById("target_label");
                                        var input_handler = document.getElementById("new_label");
                                        target.removeChild(input_handler);
                                        document.getElementById("fees2").disabled=false;
                                    }
                                }

                                
                            </script>