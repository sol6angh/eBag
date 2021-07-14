
    <div style="background-color: #EBEDEF; border: 2px solid #ff9700; border-radius: 5px;" class="container mt-2">
        <div class="row pt-2 pb-1">
            <div class="col-1">

            </div>

            <div class="col-4">
                <h4><b>Number of Materials</b></h4>
                <h4 style="margin-left: 80px;"><i class="fa fa-book"></i> <?php echo $materials; ?></h4>
            </div>

            <div class="col-4">
                <h4><b>Number of Orders</b></h4>
                <h4 style="margin-left: 70px;"><i class="fa fa-handshake-o"></i> <?php echo $orders; ?></h4>
            </div>

            <div class="col-3">
                <h4><b>Current Balance</b></h4>
                <h4 style="margin-left: 30px;"><i class="fa fa-credit-card"></i> <?php echo number_format($balance->balance, '2', '.', ' '); ?> SR</h4>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-3" style="margin-left: 80px;">
                <a href="<?php echo base_url(); ?>Dashboard/view_add_material"><img src="<?php echo base_url(); ?>assets/img/add_material.png" width="190px" height="180px" alt="image"></a>
                <hr>   
                <h3 style="margin-left: 10px;"><a href="<?php echo base_url(); ?>Dashboard/view_add_material"><b>Add Material</b></a></h3>
            </div>
            <div class="col-3" style="margin-left: 80px;">
                <a href="<?php echo base_url(); ?>Dashboard/manage_materials/<?php echo $this->session->id; ?>"><img src="<?php echo base_url(); ?>assets/img/manage_material.png" width="190px" height="180px" alt="image"></a>
                <hr>   
                <h3 style="margin-right: 0px;"><a href="<?php echo base_url(); ?>Dashboard/manage_materials/<?php echo $this->session->id; ?>"><b>Manage Materials</b></a></h3>
            </div>

            <div class="col-3" style="margin-left: 80px;">
                <a href="<?php echo base_url(); ?>Dashboard/manage_orders/<?php echo $this->session->id; ?>"><img src="<?php echo base_url(); ?>assets/img/manage_orders.png" width="190px" height="180px" alt="image"></a>
                <hr>
                <h3><a href="<?php echo base_url(); ?>Dashboard/manage_orders/<?php echo $this->session->id; ?>"><b>Manage Orders</b></a></h3>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-3" style="margin-left: 80px;">
                <a href="<?php echo base_url(); ?>Dashboard/display_balance/<?php echo $this->session->id; ?>"><img src="<?php echo base_url(); ?>assets/img/display_balance.png" width="190px" height="180px" alt="image"></a>
                <hr>   
                <h3 style="margin-right: 10px;"><a href="<?php echo base_url(); ?>Dashboard/display_balance/<?php echo $this->session->id; ?>"><b>Display Balance</b></a></h3>
            </div>
            <div class="col-3" style="margin-left: 80px;">
                <a href="<?php echo base_url(); ?>Dashboard/view_dashboard/set_payment"><img src="<?php echo base_url(); ?>assets/img/set_payment.png" width="190px" height="180px" alt="image"></a>
                <hr>   
                <h3 style="margin-right: 50px; text-align: center;"><a href="<?php echo base_url(); ?>Dashboard/view_dashboard/set_payment"><b>Set Payment Method</b></a></h3>
            </div>

            <div class="col-3" style="margin-left: 80px;">
                <a href="<?php echo base_url(); ?>Dashboard/view_dashboard/help"><img src="<?php echo base_url(); ?>assets/img/help.png" width="190px" height="180px" alt="image"></a>
                <hr>
                <h3 style="margin-left: 80px;"><a href="<?php echo base_url(); ?>Dashboard/view_dashboard/help"><b>Help</b></a></h3>
            </div>
        </div>
    </div>

    