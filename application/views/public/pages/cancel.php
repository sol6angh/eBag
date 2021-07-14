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
              <h2 style="text-align: center;"><i style="color: red; font-size: 270px;" class="fa fa-times-circle-o"></i></h2>
                <h3 style="text-align: center;">Sorry some problem happend during the payment or you just canceled the payment.</h3>
                <h3 style="text-align: center;">Try later please.</h3>
              </div>

              <div class="col-1">
              
              </div>
          </div>
        <br><br><br><br>
      </div>