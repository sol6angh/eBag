<?php if(isset($faculties)): ?>
	<br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
        <?php echo form_open(base_url() . 'admin/Admin/update_user/' . $user->id); ?>

			  <div class="row">
					<div class="col-md-6">
						<h1>Edit User Information</h1>
					</div>
					<div class="col-md-6">
					<span style="text-align: center; color: red;"><?php echo validation_errors(); ?></span>
						<div class="btn-group pull-right">
							<input type="submit" name="submit" id="page_submit" class="btn btn-default" value="Save" />
							<a href="<?php echo base_url(); ?>admin/Admin/search_users" class="btn btn-default">Close</a>
						</div>
					</div>
			  </div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<label><span style="color: red;">*</span> Select University:</label>
								<select name="select_university" class="form-control">
								<option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
								</select>
						</div>
						<div class="form-group">
							<label><span style="color: red;">*</span> Select Faculty:</label>
								<select name="select_faculty" class="form-control">
								<?php foreach($faculties as $faculty): ?>
									<option value="<?php echo $faculty->id; ?>"><?php echo $faculty->faculty_name; ?></option>
								<?php endforeach; ?>
								</select>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input class="form-control" type="text" name="firstname" required value="<?php echo $this->session->firstname; ?>" />
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" type="text" name="lastname" required value="<?php echo $this->session->lastname; ?>" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="text" name="password" readonly value="<?php echo $user->password; ?>" />
							<br>
							<a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/Admin/view_edit_password/<?php echo $user->id; ?>">Edit Password</a>
						</div>					
						 <div class="form-group">
							<label>Email</label>
							<input class="form-control" type="email" name="email" required value="<?php echo $this->session->email; ?>" />
						</div>	
						<div class="form-group">
							<label>Phone Number</label>
                            <input class="form-control" type="text" name="number" value="<?php echo $this->session->phone; ?>" />
						</div>
						<div class="form-group">
							<label>City</label>
                            <input class="form-control" type="text" name="city" value="<?php echo $this->session->city; ?>" />
						</div>
						<div class="form-group">
							<label>Balance</label>
                            <div><?php echo number_format($user->balance, '2', '.', ' ') . ' SR'; ?></div>
						</div>
						<div class="form-group">
							<label>Account Activate?</label>
							<?php if($user->is_activate == 1): ?>
                            	<div style="color: green;">Activate</div>
							<?php else: ?>
								<div style="color: red;">Not activate</div>
							<?php endif; ?>
						</div>
						<div class="form-group">
							<label>API Activate?</label>
							<?php if($user->api_activate == 1): ?>
                            	<div style="color: green;">Activate</div>
								<a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/Admin/view_edit_API/<?php echo $user->id; ?>">Edit API</a>
							<?php else: ?>
								<div style="color: red;">Not activate</div>
							<?php endif; ?>
						</div>
						<div class="form-group">
							<label>Created at</label>
                            <div>12:00 PM January 22, 2021</div>
						</div>		
					</div>
				</div>
			</form>
	  	</div>
    </div>
</div>
<?php else: ?>
		<br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<form action="<?php echo base_url(); ?>Community/get_faculties_based_on_university" method="post">

			  <div class="row">
					<div class="col-md-6">
						<h1>Edit User Information</h1>
					</div>
					
					<div class="col-md-6">
						<div class="btn-group pull-right">
							<input type="submit" name="submit" id="page_submit" class="btn btn-default" value="Apply" />
							<a href="<?php echo base_url(); ?>admin/Admin/search_users" class="btn btn-default">Close</a>
						</div>
					</div>
			  </div>
				<input type="hidden" name="admin_edit_user_mode" value="true">
				<input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
						<?php if($this->session->tempdata('password_updated')): ?>
							<div class="alert alert-success alert-dismissible">
								<?php echo $this->session->tempdata('password_updated'); ?>
							</div>
						<?php elseif($this->session->tempdata('api_updated')): ?>
							<div class="alert alert-success alert-dismissible">
								<?php echo $this->session->tempdata('api_updated'); ?>
							</div>
						<?php endif; ?>
						
						<?php if(empty($user->university_id)): ?>
							<label><span style="color: red;">*</span> Select University:</label>
								<select name="select_university" class="form-control">
								<?php foreach($universities as $university): ?>
									<option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
								<?php endforeach; ?>
								</select>
						<?php else: ?>
							<label><span style="color: red;">*</span> Select University:</label>
								<select name="select_university" class="form-control">
								<option value="<?php echo $user->university_id; ?>"><?php echo $user->university_name; ?></option>
								<?php foreach($universities as $university): ?>
									<option value="<?php echo $university->id; ?>"><?php echo $university->university_name; ?></option>
								<?php endforeach; ?>
								</select>
						<?php endif; ?>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input class="form-control" type="text" name="firstname" value="<?php echo $user->firstname; ?>" />
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input class="form-control" type="text" name="lastname" value="<?php echo $user->lastname; ?>" />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="text" name="password" readonly placeholder="<?php echo $user->password; ?>" />
							<br>
							<a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/Admin/view_edit_password/<?php echo $user->id; ?>">Edit Password</a>
						</div>					
						 <div class="form-group">
							<label>Email</label>
							<input class="form-control" type="email" name="email" value="<?php echo $user->email; ?>" />
						</div>	
						<div class="form-group">
							<label>Phone Number</label>
                            <input class="form-control" type="text" name="number" value="<?php echo $user->phone_number; ?>" />
						</div>
						<div class="form-group">
							<label>City</label>
                            <input class="form-control" type="text" name="city" value="<?php echo $user->city; ?>" />
						</div>
						<div class="form-group">
							<label>Balance</label>
                            <div><?php echo number_format($user->balance, '2', '.', ' ') . ' SR'; ?></div>
						</div>
						<div class="form-group">
							<label>Account Activate?</label>
							<?php if($user->is_activate == 1): ?>
                            	<div style="color: green;">Activate</div>
							<?php else: ?>
								<div style="color: red;">Not activate</div>
							<?php endif; ?>
						</div>
						<div class="form-group">
							<label>API Activate?</label>
							<?php if($user->api_activate == 1): ?>
                            	<div style="color: green;">Activate</div>
								<a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>admin/Admin/view_edit_API/<?php echo $user->id; ?>">Edit API</a>
							<?php else: ?>
								<div style="color: red;">Not activate</div>
							<?php endif; ?>
						</div>
						<div class="form-group">
							<label>Created at</label>
                            <div>12:00 PM January 22, 2021</div>
						</div>		
					</div>
				</div>
			</form>
	  	</div>
    </div>
</div>
<?php endif; ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>
