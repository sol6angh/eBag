
		<br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<?php echo form_open(base_url() . 'admin/Admin/update_API/' . $user->id); ?>
			  <div class="row">
					<div class="col-md-6">
						<h1>Edit User API</h1>
					</div>
					<div class="col-md-6">
						<div class="btn-group pull-right">
							<input type="submit" name="submit" id="page_submit" class="btn btn-default" value="Save" />
							<a href="<?php echo base_url(); ?>admin/Admin/view_user_form/<?php echo $user->id; ?>" class="btn btn-default">Close</a>
						</div>
					</div>
			  </div>
			
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
						<div style="color: red;"><?php echo validation_errors(); ?></div>
					<?php if($this->session->tempdata('error_happend')): ?>
						<div style="color: red;"><?php echo $this->session->tempdata('error_happend'); ?></div>
					<?php endif; ?>
							<label>Client ID</label>
							<input class="form-control" type="text" name="client_id" placeholder="" required/>
						</div>
						<div class="form-group">
							<label>Secret Key</label>
							<input class="form-control" type="text" name="secret_key" placeholder="" required/>
						</div>
	  	            </div>  
                </div>
		</form>
        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>
