<?php

class Authenticate extends CI_Controller{

    public function validate_code(){

        $this->form_validation->set_rules('validation','Validation Code','required|exact_length[4]|numeric|is_natural');
        $username = $this->input->post('catched_username');

        if ($this->form_validation->run() === FALSE){

            $data['catched_id'] = $this->User_model->catch_id($username);

            $data['main_content'] = 'public/pages/validation';

            $this->load->view('main', $data);

        }else{
                
                $code = $this->input->post('validation');

                if($this->User_model->validate_code($code)){

                    $user = $this->User_model->get_user_by_code($code);

                    $this->User_model->activate_user($code);

                    $user_data = array(
                        'id' => $user->id,
                        'firstname' => $user->firstname,
                        'lastname' => $user->lastname,
                        'username' => $user->username,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($user_data);
                    $this->session->set_tempdata('user_activated', 'Welcome to My e-bag, your account activated successfuly', 1);

                    $data['edited_header'] = true;

                    $data['header'] = 'public/includes/header_primary';
                    $data['main_content'] = 'public/pages/index';
                    $data['footer'] = 'public/includes/footer';

                    $this->load->view('main', $data);

                }else{

                    $this->session->set_tempdata('user_not_activated', 'Validation code is invalid, please try again or resend another validation code', 1);

                    $data['catched_id'] = $this->User_model->catch_id($username);

                    $data['main_content'] = 'public/pages/validation';

                    $this->load->view('main', $data);
                }
            
        }
    }

    public function login(){

            $username_email = $this->input->post('username_email');
            $password = $this->input->post('password');

            if($this->User_model->check_user_info($username_email, $password)){

                if(filter_var($username_email, FILTER_VALIDATE_EMAIL)){

                    $email = filter_var($username_email, FILTER_SANITIZE_EMAIL);

                    $user = $this->User_model->get_user_info_by_email($email, $password);
                    
                    if($this->User_model->is_activate($user->id)){

                        if($this->User_model->is_restrict($user->id)){

                            $restrict_data = array(
                                'id' => $user->id,
                                'firstname' => $user->firstname,
                                'lastname' => $user->lastname,
                                'username' => $user->username,
                                'email' => $user->email,
                                'logged_in' => TRUE
                            );

                            $this->session->set_userdata($restrict_data);

                            redirect(base_url() . 'View/view_pages/restrict_page');
                            
                        }else{

                            $user_data = array(
                                'id' => $user->id,
                                'university_id' => $user->university_id,
                                'firstname' => $user->firstname,
                                'lastname' => $user->lastname,
                                'username' => $user->username,
                                'email' => $user->email,
                                'logged_in' => TRUE
                            );
    
                            $this->session->set_userdata($user_data);
                            $this->session->set_tempdata('user_logged_in', 'Welcome back ' . '<strong>' . $this->session->firstname . ' ' . $this->session->lastname . '</strong>', 1);
    
                            $data['title'] = 'index';
    
                            $data['edited_header'] = true;
    
                            $data['header'] = 'public/includes/header_primary';
                            $data['main_content'] = 'public/pages/index';
                            $data['footer'] = 'public/includes/footer';
    
                            $this->load->view('main', $data);
                        }

                    }else{

                        $data['catched_id'] = $this->User_model->catch_id($user->username);

                        $secure_code = $this->User_model->generate_secure_code();

                        if($this->User_model->update_secure_code_for_user($user->id, $secure_code)){

                            $this->User_model->send_email($user->email, $secure_code);

                            $data['main_content'] = 'public/pages/validation';

                            $this->load->view('main', $data);

                        }else{

                            redirect(base_url() . 'View/view_pages/login');
                        }
                    }

                }else{

                    $username = filter_var($username_email, FILTER_SANITIZE_STRING);

                    $user = $this->User_model->get_user_info_by_username($username, $password);

                    if($this->User_model->is_activate($user->id)){

                        if($this->User_model->is_restrict($user->id)){

                            $restrict_data = array(
                                'id' => $user->id,
                                'firstname' => $user->firstname,
                                'lastname' => $user->lastname,
                                'username' => $user->username,
                                'email' => $user->email,
                                'logged_in' => TRUE
                            );

                            $this->session->set_userdata($restrict_data);

                            redirect(base_url() . 'View/view_pages/restrict_page');
                            
                        }else{

                            $user_data = array(
                                'id' => $user->id,
                                'university_id' => $user->university_id,
                                'firstname' => $user->firstname,
                                'lastname' => $user->lastname,
                                'username' => $user->username,
                                'email' => $user->email,
                                'logged_in' => TRUE
                            );
    
                            $this->session->set_userdata($user_data);
                            $this->session->set_tempdata('user_logged_in', 'Welcome back ' . '<strong>' . $this->session->firstname . ' ' . $this->session->lastname . '</strong>', 1);
    
                            $data['title'] = 'index';
    
                            $data['edited_header'] = true;
    
                            $data['header'] = 'public/includes/header_primary';
                            $data['main_content'] = 'public/pages/index';
                            $data['footer'] = 'public/includes/footer';
    
                            $this->load->view('main', $data);
                        }

                    }else{

                        $data['catched_id'] = $this->User_model->catch_id($user->username);

                        $secure_code = $this->User_model->generate_secure_code();

                        if($this->User_model->update_secure_code_for_user($user->id, $secure_code)){

                            $this->User_model->send_email($user->email, $secure_code);

                            $data['main_content'] = 'public/pages/validation';

                            $this->load->view('main', $data);

                        }else{

                            redirect(base_url() . 'View/view_pages/login');
                        }
                    }
                }

            }else{

                $this->session->set_tempdata('user_not_found', 'Information not found, please try again', 1);

                redirect(base_url() . 'View/view_pages/login');
            }
    }

    public function logout(){

        session_unset();
        $this->session->unset_userdata($restrict_data);
        $this->session->unset_userdata($user_data);   

        $name = 'index';

        redirect(base_url() . 'View/view_pages/' . $name);
    }
}