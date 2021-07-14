<?php
require __DIR__ . '/vendor/autoload.php';

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersAuthorizeRequest;

class Paypal extends CI_Controller{

    public function payment(){
        
        // Creating an environment
        $clientId = $this->session->client_id;
        $clientSecret = $this->session->secret_key;

        $environment = new SandboxEnvironment($clientId, $clientSecret);
        $client = new PayPalHttpClient($environment);

        if($this->session->approved){

            $order_id = $this->session->order_id;

            $request = new OrdersAuthorizeRequest($order_id);
            $request->header = ["Content-Type" => "application/json"];
            $request->header = ["Authorization" => "Basic <client_id:secret>"];

            $request = new OrdersCaptureRequest($order_id);
            $request->prefer('return=representation');
            try {
                // Call API with your client and get a response for your call
                $response = $client->execute($request);
                
                // If call returns body in response, you can get the deserialized version from the result attribute of the response

                $this->User_model->insert_order_after_payment($this->session->buyer_id, $this->session->document_id, $this->session->seller_id, $order_id);
                $this->User_model->insert_material_to_bag($this->session->buyer_id, $this->session->document_id);

                if($this->User_model->check_balance_exist($this->session->seller_id)){

                    $seller_info = $this->User_model->get_user_info_by_id($this->session->seller_id);
                    $this->User_model->move_balance_to_prev($this->session->seller_id, $seller_info->balance);

                    $seller_info = $this->User_model->get_user_info_by_id($this->session->seller_id);
                    $prev_balance = $seller_info->prev_balance;
                    //$price = $this->session->dollar_price * 3.75;

                    $new_balance = $this->session->price + $prev_balance;
                    $this->User_model->update_balance($this->session->seller_id, $new_balance);

                    $user = $this->User_model->get_user_info_by_id($this->session->id);

                    $this->email->from('myebaghelp@gmail.com', 'My e-bag Support');
                    $this->email->to($user->email);

                    $this->email->subject('Order Completed');
                    $this->email->message('You bought material successfuly');

                    $this->email->send();
                        
                    $this->session->unset_userdata($payment_info);
                    $this->session->unset_userdata($payment_return);
                    
                    redirect(base_url() . 'View/view_pages/success');

                }else{

                    $this->User_model->add_balance($this->session->seller_id, $this->session->price);

                    $user = $this->User_model->get_user_info_by_id($this->session->id);

                    $this->email->from('myebaghelp@gmail.com', 'My e-bag Support');
                    $this->email->to($user->email);

                    $this->email->subject('Order Completed');
                    $this->email->message('You bought material successfuly');

                    $this->email->send();
                        
                    $this->session->unset_userdata($payment_info);
                    $this->session->unset_userdata($payment_return);
                    
                    redirect(base_url() . 'View/view_pages/success');
                }

            }catch (HttpException $ex) {
                echo $ex->statusCode;
                print_r($ex->getMessage());
            }

        }else{

            $request = new OrdersCreateRequest();
            $request->header = ["Content-Type" => "application/json"];
            $request->header = ["Authorization" => "Basic <client_id:secret>"];
            $request->header = ["PayPal-Request-Id" => "7b92603e-77ed-4896-8e78-5dea2050476a"];
            $request->header = ["return=minimal"];
            $request->body = [
                                "intent" => "CAPTURE",
                                "purchase_units" => [[
                                    "reference_id" => strtoupper(uniqid()),
                                    "amount" => [
                                        "value" => $this->session->price,
                                        "currency_code" => "USD"
                                    ]
                                ]],
                                "application_context" => [
                                    "cancel_url" => base_url() . 'View/view_pages/cancel',
                                    "return_url" => base_url() . "Paypal/payment"
                                ] 
                            ];

            try {
                // Call API with your client and get a response for your call
                $response = $client->execute($request);
                //var_dump($response->result);die();

                $payment_return = array(
                    'order_id' => $response->result->id,
                    'approved' => true
                );

                $this->session->set_userdata($payment_return);

                //$_SESSION['order_id'] = $response->result->id;
                //$_SESSION['approved'] = true;

                // If call returns body in response, you can get the deserialized version from the result attribute of the response
                $link = $response->result->links[1]->href;
                //var_dump($link);die();
                header("location: {$link}");

            }catch (HttpException $ex) {
                echo $ex->statusCode;
                print_r($ex->getMessage());
            }

        }

    }
}