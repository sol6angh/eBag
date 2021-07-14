<?php

class User extends CI_Controller{

    public function create_user(){

        $this->form_validation->set_rules('firstname','First Name','alpha|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('lastname','Last Name','alpha|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('username','Username','alpha_dash|min_length[3]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('email','Email','valid_email');
        $this->form_validation->set_rules('pass','Password','min_length[6]|max_length[24]|alpha_dash');
        $this->form_validation->set_rules('confirmpass','Confirm Password','matches[pass]');

        if ($this->form_validation->run() === FALSE){

            redirect(base_url() . 'View/view_pages/signup');

        }else{
                        
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $username = $this->input->post('username');                
            $email = $this->input->post('email');
            $password = $this->input->post('pass');

            $secure_code = $this->User_model->create_user($firstname, $lastname, $username, $email, $password);

            $data['catched_id'] = $this->User_model->catch_id($username);

            $this->User_model->send_email($email, $secure_code);

            $data['main_content'] = 'public/pages/validation';

            $this->load->view('main', $data);
                    
        }
    }

    public function send_code_again(){

        $id = $this->input->post('catched_id');

        $this->User_model->update_code_by_id($id);

        $user = $this->User_model->get_user_info_by_id($id);

        $this->User_model->send_email($user->email, $user->secure_code);

        $data['catched_id'] = $this->User_model->catch_id($user->username);

        $data['main_content'] = 'public/pages/validation';

        $this->load->view('main', $data);
    }

    public function add_comment(){

        $this->form_validation->set_rules('comment','Comments','required');

        $comment = $this->input->post('comment');
        $user_id = $this->input->post('user_id');
        $document_id = $this->input->post('document_id');      

        if ($this->form_validation->run() === FALSE){

            redirect(base_url() . 'Document/show_material/' . $document_id);

        }else{

            $comment = filter_var($comment, FILTER_SANITIZE_STRING);

            if($this->Document_model->insert_comment($user_id, $document_id, $comment)){

                redirect(base_url() . 'Document/show_material/' . $document_id);

            }else{

                redirect(base_url() . 'Document/show_material/' . $document_id);
            }
        }
    }

    public function view_orders($id){

        $data['title'] = 'Orders';

        if($this->User_model->check_orders($id)){

            $data['orders'] = $this->User_model->get_orders($id);

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/orders';
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);

        }else{
        
            $data['no_orders'] = 'There are no orders into your account';
        
            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/orders';
            $data['footer'] = 'public/includes/footer';
        
            $this->load->view('main', $data);
        }
    }

    public function view_profile($id){

        if($this->session->logged_in){

            if($this->User_model->check_account_study_updated($id)){

                redirect(base_url() . 'User/get_profile_after_study_activated/' . $id);

            }else{

                if($this->session->id == $id){

                    $data['title'] = 'My Profile';
    
                    $data['my_profile'] = $this->User_model->get_profile($id);
    
                    $data['header'] = 'public/includes/header_primary';
                    $data['main_content'] = 'public/pages/profile';
                    $data['footer'] = 'public/includes/footer';
            
                    $this->load->view('main', $data);
                    
                }else{

                    $data['title'] = 'Profile';
    
                    $data['guest_profile'] = $this->User_model->get_profile($id);
    
                    $data['header'] = 'public/includes/header_primary';
                    $data['main_content'] = 'public/pages/profile';
                    $data['footer'] = 'public/includes/footer';
            
                    $this->load->view('main', $data);
    
                }

            }

        }else{

            if($this->User_model->check_account_study_updated($id)){

                redirect(base_url() . 'User/get_profile_after_study_activated/' . $id);

            }else{

                $data['title'] = 'Profile';

                $data['guest_profile'] = $this->User_model->get_profile($id);
    
                $data['header'] = 'public/includes/header_primary';
                $data['main_content'] = 'public/pages/profile';
                $data['footer'] = 'public/includes/footer';
                
                $this->load->view('main', $data);

            }
        }

    }

    public function view_edit_account($id){

        if($this->session->logged_in){

            $data['title'] = 'Edit Account';

            $data['my_profile'] = $this->User_model->get_profile($id);

            $data['universities'] = $this->Community_model->get_universities();

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/edit_account';
            $data['footer'] = 'public/includes/footer';
        
            $this->load->view('main', $data);

        }else{

            redirect(base_url() . 'View/view_pages/login');
        }
    }

    public function edit_account(){

        $this->form_validation->set_rules('firstname','First Name','alpha|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('lastname','Last Name','alpha|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('phone','Phone Number','exact_length[10]|numeric');
        $this->form_validation->set_rules('city','City','alpha|max_length[16]');

        $id = $this->input->post('id');
        $firstname = filter_var($this->input->post('firstname'), FILTER_SANITIZE_STRING);
        $lastname = filter_var($this->input->post('lastname'), FILTER_SANITIZE_STRING);
        $phone = filter_var($this->input->post('phone'), FILTER_SANITIZE_STRING);
        $city = filter_var($this->input->post('city'), FILTER_SANITIZE_STRING);

        if ($this->form_validation->run() === FALSE){

            $data['title'] = 'Edit Account';

            $data['my_profile'] = $this->User_model->get_profile($id);

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/edit_account';
            $data['footer'] = 'public/includes/footer';
        
            $this->load->view('main', $data);

        }else{
             
            if($this->User_model->update_account($id, $firstname, $lastname, $phone, $city)){

                $this->session->set_tempdata('info_updated','Account information updated successfuly', 1);

                if($this->User_model->check_account_study_updated($id)){

                    redirect(base_url() . 'User/get_profile_after_study_activated/' . $id);
                    
                }else{

                    redirect(base_url() . 'User/view_profile/' . $id);
                }

            }else{

                redirect(base_url() . 'View/view_pages/edit_account');
            }
                    
        }
    }

    public function update_university_and_faculty(){

        if($this->session->logged_in){

            $university_id = $this->input->post('select_university');
            $faculty_id = $this->input->post('select_faculty');

            if($this->User_model->update_university_and_faculty($this->session->id, $university_id, $faculty_id)){

                $user = $this->User_model->get_user_info_by_id($this->session->id);

                $user_data = array(
                    'university_id' => $user->university_id
                    /*'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'username' => $user->username,
                    'logged_in' => TRUE*/
                );

                $this->session->set_userdata($user_data);

                $this->session->set_tempdata('info_updated','Account information updated successfuly', 1);

                redirect(base_url() . 'User/view_profile/' . $this->session->id);

            }else{

                redirect(base_url() . 'User/view_profile/' . $this->session->id);
            }

        }else{

            redirect(base_url() . 'View/view_pages/login');
        }
    }

    public function get_profile_after_study_activated($id){

        if($this->session->logged_in){

            if($this->session->id == $id){

                $data['title'] = 'My Profile';

                $data['my_profile'] = $this->User_model->get_profile_after_study_activated($id);

                $data['header'] = 'public/includes/header_primary';
                $data['main_content'] = 'public/pages/profile';
                $data['footer'] = 'public/includes/footer';
        
                $this->load->view('main', $data);
                
            }else{

                $data['title'] = 'Profile';

                $data['guest_profile'] = $this->User_model->get_profile_after_study_activated($id);

                $data['header'] = 'public/includes/header_primary';
                $data['main_content'] = 'public/pages/profile';
                $data['footer'] = 'public/includes/footer';
        
                $this->load->view('main', $data);

            }

        }else{

            $data['title'] = 'Profile';

            if($this->User_model->check_account_study_updated($id)){

                $data['guest_profile'] = $this->User_model->get_profile_after_study_activated($id);

                $data['header'] = 'public/includes/header_primary';
                $data['main_content'] = 'public/pages/profile';
                $data['footer'] = 'public/includes/footer';
            
                $this->load->view('main', $data);

            }else{

                redirect(base_url() . 'View/view_pages/index');
            }
        }
    }

    public function view_bag($user_id){

        if($this->session->logged_in){

            $data['title'] = 'My Bag';

            if($this->User_model->check_bag_items($user_id)){

                $data['items'] = $this->User_model->get_my_bag($user_id);

                $data['header'] = 'public/includes/header_primary';
                $data['main_content'] = 'public/pages/my_bag';
                $data['footer'] = 'public/includes/footer';
            
                $this->load->view('main', $data);

            }else{

                $data['no_items'] = 'There are no materials into your Bag';

                $data['header'] = 'public/includes/header_primary';
                $data['main_content'] = 'public/pages/my_bag';
                $data['footer'] = 'public/includes/footer';
            
                $this->load->view('main', $data);
            }

        }else{

            redirect(base_url() . 'View/view_pages/login');
        }
    }

    public function add_to_bag($document_id){

        if($this->session->logged_in){

            $document = $this->Document_model->show_material($document_id);

            if($document->is_free == 1){

                if($this->User_model->insert_material_to_bag($this->session->id, $document_id)){

                    if($this->User_model->insert_order($this->session->id, $document->id, $document->user_id)){

                        $user = $this->User_model->get_user_info_by_id($this->session->id);

                        $this->email->from('myebaghelp@gmail.com', 'My e-bag Support');
                        $this->email->to($user->email);

                        $this->email->subject('Order Completed');
                        $this->email->message('You bought material successfuly');

                        $this->email->send();

                        $this->session->set_tempdata('material_inserted','Material inserted to your bag successfuly', 1);
                        redirect(base_url(). 'User/view_bag/' . $this->session->id);

                    }else{

                        $this->session->set_tempdata('error_happend','Some error happend', 1);
                        redirect(base_url(). 'Document/show_material/' . $document_id);
                    }

                }else{

                    $this->session->set_tempdata('error_happend','Some error happend', 1);
                    redirect(base_url(). 'Document/show_material/' . $document_id);
                }

            }else{

                $buyer_info = $this->User_model->get_user_info_by_id($this->session->id);
                $seller_info = $this->User_model->get_user_info_by_id($document->user_id);
                $paypal_api = $this->User_model->get_api($document->user_id);
                $document_info = $document;

                $price = $document_info->price / 3.75;
                $price = number_format($price, '2', '.', ' ');

                $payment_data = array(
                    'buyer_id' =>$buyer_info->id,
                    'seller_id' =>$seller_info->id,
                    'client_id' =>$paypal_api->client_id,
                    'secret_key' =>$paypal_api->secret_key,
                    'document_id' =>$document_info->id,
                    'dollar_price' =>$price,
                    'price' => $document_info->price
                    
                );

                $this->session->set_userdata($payment_data);

                /*
                    Redirect to paypal payment class
                */

                redirect(base_url() . 'Paypal/payment');

            }

        }else{

            redirect(base_url() . 'View/view_pages/login');
        }
    }

    public function add_rating($user_id){

        if($this->session->logged_in){

            $rating = $this->input->post('rating');
            $document_id = $this->input->post('document_id');

            if($rating == 0){

                $this->session->set_tempdata('error_rating','Select rating please', 1);

                redirect(base_url() . 'User/view_bag/' . $user_id);

            }else{

                if($this->User_model->insert_rating($user_id, $document_id, $rating)){

                    if($this->User_model->activate_rating($user_id, $document_id)){

                        $this->session->set_tempdata('rating_inserted','Rating added successfuly', 1);

                        redirect(base_url() . 'User/view_bag/' . $user_id);

                    }else{

                        redirect(base_url() . 'User/view_bag/' . $user_id);
                    }

                }else{

                    redirect(base_url() . 'User/view_bag/' . $user_id);
                }

            }

        }else{

            redirect(base_url() . 'View/view_pages/login');
        }
    }

    public function change_password(){

        if($this->session->logged_in){

            $this->form_validation->set_rules('oldpass', 'Old Password', 'callback_check_oldpass_exist');
            $this->form_validation->set_rules('newpass', 'New Password', 'min_length[6]|max_length[24]|alpha_dash');
            $this->form_validation->set_rules('confirmpass', 'Password Confirmation', 'matches[newpass]');

            if ($this->form_validation->run() === FALSE){

                $data['title'] = 'Change Password';

                $data['header'] = 'public/includes/header_primary';
                $data['main_content'] = 'public/pages/change_password';
                $data['footer'] = 'public/includes/footer';
                    
                $this->load->view('main', $data);

            }else{

                $user_id = $this->input->post('user_id');
                $old_pass = $this->input->post('oldpass');
                $new_pass = $this->input->post('newpass');
                $confirm_pass = $this->input->post('confirmpass');

                $data['title'] = 'Change Password';

                if($this->User_model->update_user_password($user_id, $new_pass)){

                    $this->session->set_tempdata('password_changed','Your password changed successfuly', 1);

                    $data['header'] = 'public/includes/header_primary';
                    $data['main_content'] = 'public/pages/change_password';
                    $data['footer'] = 'public/includes/footer';
                        
                    $this->load->view('main', $data);

                }else{

                    $data['header'] = 'public/includes/header_primary';
                    $data['main_content'] = 'public/pages/change_password';
                    $data['footer'] = 'public/includes/footer';
                        
                    $this->load->view('main', $data);
                }

            }

        }else{

            redirect(base_url() . 'View/view_pages/login');
        }
    }

    public function check_oldpass_exist($old_pass){

        if($this->User_model->check_oldpass_exist($this->session->id, $old_pass)){

            return true;

        }else{   
            
            $this->form_validation->set_message('check_oldpass_exist', 'Check your old password is correct before change your password');

            return FALSE;
        }
    }

    public function delete_account($user_id){

        if($this->session->logged_in){

            if($this->User_model->delete_account($user_id)){

                redirect(base_url() . 'Authenticate/logout');

            }else{

                redirect(base_url() . 'User/view_profile/' . $user_id);
            }

        }else{

            redirect(base_url() . 'View/view_pages/login');
        }
    }

    public function contact(){

        $title = $this->input->post('title');
        $description = $this->input->post('description');

        if($this->session->id){

            if($title == '0'){

                $this->session->set_tempdata('error_contact','Choose topic please', 1);

                redirect(base_url() . 'View/view_pages/contact');

            }else{

                $this->User_model->insert_contact($this->session->id, $title, $this->session->email, $description);

                $this->session->set_tempdata('contact_sent','You sent a feedback, thank you', 1);

                redirect(base_url() . 'View/view_pages/contact');
            }

        }else{

            $email = $this->input->post('email');

            if($title == '0'){

                $this->session->set_tempdata('error_contact','Choose topic please', 1);

                redirect(base_url() . 'View/view_pages/contact');

            }else{

                $this->User_model->insert_contact($user_id = 0, $title, $email, $description);

                $this->email->from('myebaghelp@gmail.com', 'My e-bag Support');
                $this->email->to('myebaghelp@gmail.com');

                $this->email->subject('Contact Us');
                $this->email->message($description);

                $this->email->send();

                $this->session->set_tempdata('contact_sent','You sent a feedback, thank you', 1);

                redirect(base_url() . 'View/view_pages/contact');
            }
        }
    }

    public function contact_restrict($user_id){

        $email = $this->input->post('email');
        $title = $this->input->post('title');
        $description = $this->input->post('description');

        if($this->User_model->contact_restrict($user_id, $email, $title, $description)){

            $this->session->set_flashdata('contact_restrict','You sent a justification successfuly, thank you', 1);

            redirect(base_url() . 'View/view_pages/restrict_page');

        }else{

            $this->session->set_tempdata('error_happend','Some error happend', 1);
                        
            redirect(base_url() . 'View/view_pages/restrict_page');

        }
    }
}