<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<?php if($this->uri->segment(3)=="index"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/Admin/index">Dashboard</a></li>
            <li class="<?php if($this->uri->segment(3)=="modify_materials"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/Admin/modify_materials">Access and Modify Materials</a></li>
            <li class="<?php if($this->uri->segment(3)=="search_users"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/Admin/search_users">Search User Information</a></li>
            <li class="<?php if($this->uri->segment(3)=="moniter_orders"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/Admin/moniter_orders">Monitor Orders</a></li>
            <li class="<?php if($this->uri->segment(3)=="restrict_accounts"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/Admin/restrict_accounts">Restrict Accounts</a></li>
            <li class="<?php if($this->uri->segment(3)=="recieve_reports"){echo "active";}?>"><a href="<?php echo base_url(); ?>admin/Admin/recieve_reports">Recieve Reports</a></li>
          </ul> 
        </div>