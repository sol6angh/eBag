
        <br><br>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Monitor Orders</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Buyer ID</th>
                  <th>Seller ID</th>
                  <th>Document ID</th>
                  <th>Transaction ID</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Order date</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($orders as $order): ?>
                <tr>
                  <td><?php echo $order->id; ?></td>
                  <td><?php echo $order->buyer_id; ?></td>
                  <td><?php echo $order->seller_id; ?></td>
                  <td><?php echo $order->document_id; ?></td>
                  <td><?php echo $order->transaction_id; ?></td>
                  <?php if($order->price == 0): ?>
                    <td>0 SR</td>
                  <?php else: ?>
                    <td><?php echo $order->price; ?> SR</td>
                  <?php endif; ?>
                  <td style="color: green;">Complete</td>
                  <td><?php echo date("F j, Y, g:i a",strtotime($order->order_date)); ?></td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
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
