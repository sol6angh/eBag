<?php if(isset($faculties)): ?>

		<br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

		<?php echo form_open(base_url() . 'admin/Admin/update_material/' . $material->id); ?>

			  <div class="row">
					<div class="col-md-6">
						<h1>Edit Material</h1>
						<span style="color: red;"><?php echo validation_errors(); ?></span>
					</div>
					
					<div class="col-md-6">
						<div class="btn-group pull-right">
							<input type="submit" name="submit" id="page_submit" class="btn btn-default" value="Save" />
							<a href="<?php echo base_url(); ?>admin/Admin/modify_materials" class="btn btn-default">Close</a>
						</div>
					</div>
			  </div>

					<div class="row mt-3">
							<div class="col-lg-12">
							<?php if($this->session->tempdata('no_select_university')) : ?>
									<div style="color: red;"><?php echo $this->session->tempdata('no_select_university'); ?></div>
							<?php endif; ?>
								<label><span style="color: red;">*</span> Select University:</label>
								<select name="select_university" class="form-control">
								<option value="<?php echo $material->university_id; ?>"><?php echo $material->university_name; ?></option>
								</select>
							</div>
					</div>
					<br>
					<div class="row mt-3">
						<div class="col-lg-12">
                            <label><span style="color: red;">*</span> Select your faculty:</label>
                            <select name="select_faculty" class="form-control">
							<option value="<?php echo $material->faculty_id; ?>"><?php echo $material->faculty_name; ?></option>
                            <?php foreach($faculties as $faculty): ?>
                                <option value="<?php echo $faculty->id; ?>"><?php echo $faculty->faculty_name; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
					</div>

				<br>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label><span style="color: red;">*</span> Material Name</label>
							<input name="title" type="text" class="form-control" value="<?php echo $this->session->title; ?>" required/>
						</div>
						<div class="form-group">
							<label><span style="color: red;">*</span> Description</label>
							<textarea name="description" cols="30" rows="4" class="form-control" required><?php echo $this->session->description; ?></textarea>
						</div>					
						 <div class="form-group">
							<label>Image</label>
							<img src="<?php echo base_url(); ?>assets/img/users/<?php echo $material->image; ?>" width="200" height="200" alt="">
						</div>	
						<div class="form-group">
							<label><span style="color: red;">*</span> Select Category:</label>
								<select name="select_category" class="form-control">
									<option value="<?php echo $material->category_id; ?>"><?php echo $material->category_name; ?></option>
								<?php foreach($categories as $category): ?>
									<option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
								<?php endforeach; ?>
								</select>
						</div>
						<input type="hidden" name="admin_edit_material_mode" value="true">
                        <input type="hidden" name="document_id" value="<?php echo $material->id; ?>">		
					</div>
				</div>

				<div class="row mt-3">

					<div class="col-lg-12">
						<label><span style="color: red;">*</span> Set your new cost:</label>
                        <?php if($material->is_free == 1): ?>
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
                                  <span id="target_label"><input type="text" name="enter_fees" id="new_label" value="<?php echo $material->price; ?>"></span>
                            </div>
							<script>
									document.getElementById("fees2").disabled=true;
							</script>
                        <?php endif; ?>
					</div>

				</div>
			</form>
			<br>
			<a href="view_file.html" class="btn btn-primary btn-block" download>View File</a>
	  	</div>
    </div>
</div>

<?php else: ?>
		<br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

		<form action="<?php echo base_url(); ?>Community/get_faculties_based_on_university" method="post">

			  <div class="row">
					<div class="col-md-6">
						<h1>Edit Material</h1>
					</div>
					<div class="col-md-6">
						<div class="btn-group pull-right">
							<input type="submit" name="submit" id="page_submit" class="btn btn-default" value="Apply" />
							<a href="<?php echo base_url(); ?>admin/Admin/modify_materials" class="btn btn-default">Close</a>
						</div>
					</div>
			  </div>

					<div class="row mt-3">
							<div class="col-lg-12">
							<?php if($this->session->tempdata('no_select_university')) : ?>
									<div style="color: red;"><?php echo $this->session->tempdata('no_select_university'); ?></div>
							<?php endif; ?>
								<label><span style="color: red;">*</span> Select University:</label>
								<select name="select_university" class="form-control">
								<option value="<?php echo $material->university_id; ?>"><?php echo $material->university_name; ?></option>
								<?php foreach($universities as $university): ?>
									<option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
								<?php endforeach; ?>
								</select>
							</div>
					</div>

				<br>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label><span style="color: red;">*</span> Material Name</label>
							<input name="title" type="text" class="form-control" value="<?php echo $material->title; ?>" required/>
						</div>
						<div class="form-group">
							<label><span style="color: red;">*</span> Description</label>
							<textarea name="description" cols="30" rows="4" class="form-control" required><?php echo $material->description; ?></textarea>
						</div>					
						 <div class="form-group">
							<label>Image</label>
							<img src="<?php echo base_url(); ?>assets/img/users/<?php echo $material->image; ?>" width="200" height="200" alt="">
						</div>	
						<input type="hidden" name="admin_edit_material_mode" value="true">
                        <input type="hidden" name="document_id" value="<?php echo $material->id; ?>">		
					</div>
				</div>
			</form>
			<a href="view_file.html" class="btn btn-primary btn-block" download>View File</a>
	  	</div>
    </div>
</div>
<?php endif; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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


function func2(){
	var fees_handler = document.getElementById("fees2");
	var free_handler = document.getElementById("free2");

	if(fees_handler.checked){

		var new_input = document.createElement("input");
		new_input.setAttribute("type","text");
		new_input.setAttribute("name","enter_fees");
		new_input.setAttribute("id","new_label");
		new_input.setAttribute("placeholder","Enter Your Fees");
		new_input.setAttribute("value","<?php echo $material->price; ?>");

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
	
  </body>
</html>

