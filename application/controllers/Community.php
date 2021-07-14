<?php

class Community extends CI_Controller{

    public function get_faculties_based_on_university($edit_mode = false){

        $university_id = $this->input->post('select_university');
        $add_material = $this->input->post('add_material_mode');
        $edit_material = $this->input->post('edit_material_mode');
        $admin_edit_material = $this->input->post('admin_edit_material_mode');
        $admin_edit_user = $this->input->post('admin_edit_user_mode');
        $document_id = $this->input->post('document_id');

        if($university_id == 0){

            $this->session->set_tempdata('no_select_university','Please select your university first', 1);

            if($edit_mode == true){

                redirect(base_url() . 'User/view_edit_account/' . $this->session->id);

            }elseif($add_material == true){

                redirect(base_url() . 'Dashboard/view_add_material');

            }elseif($edit_material == true){

                redirect(base_url() . 'Dashboard/view_edit_material/' . $document_id);

            }else{
                
                redirect(base_url() . 'View/view_pages/search');
            }

        }else{

            if($this->Community_model->check_university_by_id($university_id)){

                $data['faculties'] = $this->Community_model->get_faculties_based_on_university($university_id);
    
                $data['university'] = $this->Community_model->get_university_name($university_id);

                $data['universities'] = $this->Community_model->get_universities();

                if($edit_mode == true){

                    $data['title'] = 'Edit Account';

                    $data['my_profile'] = $this->User_model->get_profile($this->session->id);

                    $data['header'] = 'public/includes/header_primary';
                    $data['main_content'] = 'public/pages/edit_account';
                    $data['footer'] = 'public/includes/footer';
    
                    $this->load->view('main', $data);

                }elseif($add_material == true){

                    $data['title'] = 'Dashboard';

                    $data['categories'] = $this->Document_model->get_all_category();

                    $data['header'] = 'public/includes/header_dashboard';
                    $data['sidebar'] = 'public/includes/sidebar_dashboard';
                    $data['main_content'] = 'public/pages/dashboard/add_material';
    
                    $this->load->view('main', $data);

                }elseif($edit_material == true){

                    $data['title'] = 'Dashboard';

                    if($this->Document_model->check_material_belong_to_user($this->session->id, $document_id)){

                        $university_id = $this->input->post('select_university');
                        $category_id = $this->input->post('select_category');
                        $title = $this->input->post('title');
                        $description = $this->input->post('description');

                        $edit_material_info = array(
                            'document_id' => $document_id,
                            'title' => $title,
                            'description' => $description
                        );
                
                        $this->session->set_userdata($edit_material_info);

                        $data['faculties'] = $this->Community_model->get_faculties_based_on_university($university_id);

                        $data['university'] = $this->Community_model->get_university_by_id($university_id);

                        $data['my_category'] = $this->Document_model->get_category_by_id($category_id);

                        $data['categories'] = $this->Document_model->get_all_category();

                        $data['my_material'] = $this->Document_model->show_material($document_id);

                        $data['header'] = 'public/includes/header_dashboard';
                        $data['sidebar'] = 'public/includes/sidebar_dashboard';
                        $data['main_content'] = 'public/pages/dashboard/edit_material';

                        $this->load->view('main', $data);

                    }

                }elseif($admin_edit_material == true){

                    $data['title'] = 'Edit Material';

                    $university_id = $this->input->post('select_university');
                    $category_id = $this->input->post('select_category');
                    $title = $this->input->post('title');
                    $description = $this->input->post('description');

                    $edit_material_info = array(
                        'document_id' => $document_id,
                        'title' => $title,
                        'description' => $description,
                        'university_id' => $university_id
                    );
                
                    $this->session->set_userdata($edit_material_info);

                    $data['faculties'] = $this->Community_model->get_faculties_based_on_university($university_id);

                    $data['university'] = $this->Community_model->get_university_by_id($university_id);

                    $data['my_category'] = $this->Document_model->get_category_by_id($category_id);

                    $data['categories'] = $this->Document_model->get_all_category();

                    $data['material'] = $this->Admin_model->get_material($document_id);

                    $data['header'] = 'admin/includes/header';
                    $data['sidebar'] = 'admin/includes/sidebar';
                    $data['main_content'] = 'admin/pages/edit_material';

                    $this->load->view('main', $data);

                }elseif($admin_edit_user == true){

                    $user_id = $this->input->post('user_id');
                    $firstname = $this->input->post('firstname');
                    $lastname = $this->input->post('lastname');
                    $email = $this->input->post('email');
                    $phone = $this->input->post('number');
                    $city = $this->input->post('city');

                    $admin_user_info = array(
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'email' => $email,
                        'phone' => $phone,
                        'city' => $city
                    );
                
                    $this->session->set_userdata($admin_user_info);

                    $data['faculties'] = $this->Community_model->get_faculties_based_on_university($university_id);

                    $data['university'] = $this->Community_model->get_university_by_id($university_id);

                    if($this->User_model->check_account_study_updated($user_id)){

                        $data['user'] = $this->User_model->get_profile_after_study_activated($user_id);
                        
                        $data['header'] = 'admin/includes/header';
                        $data['sidebar'] = 'admin/includes/sidebar';
                        $data['main_content'] = 'admin/pages/edit_user';
            
                        $this->load->view('main', $data);
            
                    }else{
            
                        $data['user'] = $this->User_model->get_profile($user_id);
                        
                        $data['header'] = 'admin/includes/header';
                        $data['sidebar'] = 'admin/includes/sidebar';
                        $data['main_content'] = 'admin/pages/edit_user';
            
                        $this->load->view('main', $data);
                    }

                }else{

                    $data['header'] = 'public/includes/header_primary';
                    $data['main_content'] = 'public/pages/search';
                    $data['footer'] = 'public/includes/footer';
    
                    $this->load->view('main', $data);
                }
    
            }else{
    
                redirect(base_url() . 'View/view_pages/index');
            }
        }

    }

    public function get_universities(){

        $data['title'] = 'Community';

        $data['universities'] = $this->Community_model->get_universities();

        $data['header'] = 'public/includes/header_primary';
        $data['main_content'] = 'public/pages/universities';
        $data['footer'] = 'public/includes/footer';
    
        $this->load->view('main', $data);
    }

    public function view_community($university_id){

        $data['title'] = 'Community';

        $data['university'] = $this->Community_model->get_university_by_id($university_id);

        $data['main_content'] = 'public/pages/community';
    
        $this->load->view('main', $data);
    }

    public function get_chat($university_id){

        $data['title'] = 'Community';

        if($this->Community_model->check_chat($university_id)){

            $data['chat'] = $this->Community_model->get_chat($university_id);

            $data['main_content'] = 'public/pages/messages';
    
            $this->load->view('main', $data);

        }else{

            $data['no_chat'] = 'No one say anything, Be the first..';

            $data['main_content'] = 'public/pages/messages';
    
            $this->load->view('main', $data);
        }
    }

    public function send_chat(){

        $data['title'] = 'Community';

        $user_id = $this->input->post('user_id');
        $university_id = $this->input->post('university_id');
        $message = $this->input->post('message');
        $message = htmlspecialchars($message, ENT_QUOTES);

        if(filter_var($message, FILTER_SANITIZE_STRING)){

            if($this->Community_model->insert_chat_message($user_id, $university_id, $message)){

                redirect(base_url(). 'Community/view_community/' . $university_id);

            }else{

                $this->session->set_tempdata('error_happend','Some error happend', 1);
                redirect(base_url(). 'Community/view_community/' . $university_id);
            }

        }else{

            $this->session->set_tempdata('error_happend','Some error happend', 1);
            redirect(base_url(). 'Community/view_community/' . $university_id);
        }
    }
}