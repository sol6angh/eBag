

    <div class="contents bg-light">
        <div class="container mt-3">
            <h3>Manage orders</h3>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Material name</th>
                        <th>Number</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Buyer</th>
                        <th>Purchase date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($orders as $order): ?>
                      <tr>
                        <td><?php echo $order->title; ?></td>
                        <td>#<?php echo $order->number; ?></td>
                        <?php if($order->is_free == 1) : ?>
                          <td class="text-danger"><b>Free</b></td>
                        <?php else : ?>
                          <td class="text-danger"><b><?php 
                            echo number_format($order->price, '2', '.', ' ') . ' SR'; ?>
                          </b></td>
                        <?php endif; ?>
                        <td><?php echo $order->category_name; ?></td>
                        <td><a href="<?php echo base_url(); ?>User/view_profile/<?php echo $order->buyer_id; ?>" target="_blank" style="color: black;"><?php echo $order->username; ?></a></td>
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
    </div>
    
</body>
</html>