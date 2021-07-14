

        <br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Recieve Reports</h1>
          <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Report ID</th>
                    <th>User ID</th>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($reports as $report): ?>
                  <tr>
                    <td><?php echo $report->id; ?></td>
                    <td><?php echo $report->user_id; ?></td>
                    <td><?php echo $report->title; ?></td>
                    <td><?php echo date("F j, Y, g:i a",strtotime($report->time)); ?></td>
                    <td><a href="<?php echo base_url(); ?>admin/Admin/view_report/<?php echo $report->id; ?>" class="btn btn-primary">View</a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
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
