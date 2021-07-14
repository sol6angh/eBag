
        <br><br>
        <div class="col-sm-6 col-sm-offset-1 col-md-10 col-md-offset-2 main">
          <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
              <div class="btn-group pull-right">
                <a href="<?php echo base_url(); ?>admin/Admin/recieve_reports" class="btn btn-default">Close</a>
              </div>
            </div>
          </div>
          <h1 class="page-header">View Report</h1>
          <div class="table-responsive">
            <div class="row">
                <div class="col">
                    <label>Report ID:</label>
                    <div style="background-color: #EBEDEF; padding: 10px;"><?php echo $report->id; ?></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Email:</label>
                    <div style="background-color: #EBEDEF; padding: 20px;"><strong><?php echo $report->email; ?></strong></div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col">
                    <label>Title:</label>
                    <div style="background-color: #EBEDEF; padding: 20px;"><strong><?php echo $report->title; ?></strong></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label>Description:</label>
                    <div style="background-color: #EBEDEF; padding: 20px;"><strong><?php echo $report->description; ?></strong></div>
                </div>
            </div>
          </div>
		</div>
	  </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
  </body>
</html>
