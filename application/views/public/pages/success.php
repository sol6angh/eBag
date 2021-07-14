<?php
$payment_return = array(
                    'approved' => false
                );

                $this->session->set_userdata($payment_return);
?>

<div class="container-fluid mt-4">
      <br>
          <div class="row">
              <div class="col-1">
              
              </div>

              <div class="col-10">
                <h2 style="text-align: center;"><i style="color: green; font-size: 270px;" class="fa fa-check-circle-o"></i></h2>
                <h3 style="text-align: center;">Thanks for supporting us payment made, <a href="<?php echo base_url(); ?>User/view_bag/<?php echo $this->session->id; ?>">Check your bag now.</a></h3>
              </div>

              <div class="col-1">
              
              </div>
          </div>
        <br><br><br><br>
      </div>