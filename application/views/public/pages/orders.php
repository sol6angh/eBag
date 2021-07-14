
<?php if(isset($orders)) : ?> 
    <div class="container-fluid mt-4">
        <h2>My Orders <i class="fa fa-money" style="font-size:30px; color: black;"></i></h2>
        <h6>You will find here all your orders details</h6>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Document number</th>
                        <th>Transaction ID</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Publisher</th>
                        <th>Invoice date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orders as $order) : ?>
                      <tr>
                        <td>#<?php echo $order->number; ?></td>
                        <td><?php echo $order->transaction_id; ?></td>
                        <td><b><?php echo number_format($order->price, '2', '.', ' ');?> SR</b></td>
                        <td><?php echo $order->category_name; ?></td>
                        <td><a href="<?php echo base_url(); ?>User/view_profile/<?php echo $order->user_id; ?>"><?php echo $order->username; ?></a></td>
                        <td><?php echo $order->order_date; ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>Document/show_material/<?php echo $order->document_id; ?>" target="_blank" class="btn btn-primary"><span class="fa fa-search"></span></a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <br><br>
<?php else: ?>
      <div class="container-fluid mt-4">
      <h2>My Orders <i class="fa fa-money" style="font-size:30px; color: black;"></i></h2>
      <h6>You will find here all your orders details</h6>
      <br><br><br><br><br>
          <div class="row">
              <div class="col-1">
              
              </div>

              <div class="col-10">
                <h2 style="text-align: center;"><?php echo $no_orders; ?></h2>
              </div>

              <div class="col-1">
              
              </div>
          </div>
        <br><br><br><br><br><br><br>
      </div>
<?php endif; ?>
        

    