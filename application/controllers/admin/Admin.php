<?php 

class Admin extends CI_Controller{

    public function __construct(){

        parent::__construct();
        
        if(!$this->session->logged_in_admin){

            redirect(base_url() . 'admin/Authenticate/view_form');
        }
    }

    public function index($limit = true){

        $data['latest_materials'] = $this->Admin_model->get_materials($limit);
        $data['latest_orders'] = $this->Admin_model->get_orders($limit);
        $data['latest_users'] = $this->Admin_model->get_users($limit);

        $data['header'] = 'admin/includes/header';
        $data['sidebar'] = 'admin/includes/sidebar';
        $data['main_content'] = 'admin/pages/index';

        $this->load->view('main', $data);
    }

    public function modify_materials($limit = false){

        $data['materials'] = $this->Admin_model->get_materials($limit);
        $data['materials_deleted'] = $this->Admin_model->get_materials_deleted();

        $data['header'] = 'admin/includes/header';
        $data['sidebar'] = 'admin/includes/sidebar';
        $data['main_content'] = 'admin/pages/modify_materials';

        $this->load->view('main', $data);
    }

    public function search_users($limit = false){

        $data['users'] = $this->Admin_model->get_users($limit);

        $data['header'] = 'admin/includes/header';
        $data['sidebar'] = 'admin/includes/sidebar';
        $data['main_content'] = 'admin/pages/search_users';

        $this->load->view('main', $data);
    }

    public function moniter_orders($limit = false){

        $data['orders'] = $this->Admin_model->get_orders($limit);

        $data['header'] = 'admin/includes/header';
        $data['sidebar'] = 'admin/includes/sidebar';
        $data['main_content'] = 'admin/pages/moniter_orders';

        $this->load->view('main', $data);
    }

    public function restrict_accounts($limit = false){

        $data['users'] = $this->Admin_model->get_users($limit);

        $data['header'] = 'admin/includes/header';
        $data['sidebar'] = 'admin/includes/sidebar';
        $data['main_content'] = 'admin/pages/restrict_accounts';

        $this->load->view('main', $data);
    }

    public function recieve_reports(){

        $data['reports'] = $this->Admin_model->get_reports();

        $data['header'] = 'admin/includes/header';
        $data['sidebar'] = 'admin/includes/sidebar';
        $data['main_content'] = 'admin/pages/recieve_reports';

        $this->load->view('main', $data);
    }

    public function view_edit_material($document_id){

        $data['material'] = $this->Admin_model->get_material($document_id);
        $data['universities'] = $this->Community_model->get_universities();
        $data['categories'] = $this->Document_model->get_all_category();

        $data['header'] = 'admin/includes/header';
        $data['sidebar'] = 'admin/includes/sidebar';
        $data['main_content'] = 'admin/pages/edit_material';

        $this->load->view('main', $data);
    }

    public function update_material($document_id){

        $this->form_validation->set_rules('title', 'Material Name', 'min_length[6]|max_length[40]');
        $this->form_validation->set_rules('description', 'Description', 'min_length[20]|max_length[300]');

        if ($this->form_validation->run() === FALSE){

            $data['faculties'] = $this->Community_model->get_faculties_based_on_university($this->session->university_id);

            $data['material'] = $this->Admin_model->get_material($document_id);
            
            $data['header'] = 'admin/includes/header';
            $data['sidebar'] = 'admin/includes/sidebar';
            $data['main_content'] = 'admin/pages/edit_material';

            $this->load->view('main', $data);

        }else{

            $university_id = $this->input->post('select_university');
            $faculty_id = $this->input->post('select_faculty');
            $category_id = $this->input->post('select_category');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $cost = $this->input->post('set_payment');

            if($cost == 'free'){

                $is_free = 1;
                $price = 0;
                
                if($this->Admin_model->update_material($document_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price)){

                    $document = $this->Admin_model->get_material($document_id);
                    
                    $this->session->set_tempdata('material_updated','Material number <b>' . $document->number . '</b> updated successfuly', 1);
                        
                    $this->session->unset_userdata($admin_edit_material_study);
                        
                    redirect(base_url() . 'admin/Admin/modify_materials');
                        
                }else{
                        
                    $this->session->set_tempdata('error_happend','Some error happend', 1);
                        
                    redirect(base_url() . 'admin/Admin/modify_materials');
                }
                
            }else{

               $is_free = 0;
               $price = $this->input->post('enter_fees');
               
                if($this->Admin_model->update_material($document_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price)){

                    $document = $this->Admin_model->get_material($document_id);
                    
                    $this->session->set_tempdata('material_updated','Material number <b>' . $document->number . '</b> updated successfuly', 1);
                        
                    $this->session->unset_userdata($admin_edit_material_study);
                        
                    redirect(base_url() . 'admin/Admin/modify_materials');
                    
                }else{
                        
                    $this->session->set_tempdata('error_happend','Some error happend', 1);
                        
                    redirect(base_url() . 'admin/Admin/modify_materials');
                }

            }
        }
    }

    public function delete_material($document_id){

        if($this->Document_model->delete_material($document_id)){

            $this->session->set_tempdata('material_deleted','Material deleted successfuly', 1);

            redirect(base_url() . 'admin/Admin/modify_materials');

        }else{

            $this->session->set_tempdata('error_happend','Some error happend', 1);
                        
            redirect(base_url() . 'admin/Admin/modify_materials');
        }
    }

    public function view_user_form($user_id){

        if($this->User_model->check_account_study_updated($user_id)){

            $data['user'] = $this->User_model->get_profile_after_study_activated($user_id);
            $data['universities'] = $this->Community_model->get_universities();
            
            $data['header'] = 'admin/includes/header';
            $data['sidebar'] = 'admin/includes/sidebar';
            $data['main_content'] = 'admin/pages/edit_user';

            $this->load->view('main', $data);

        }else{

            $data['user'] = $this->User_model->get_profile($user_id);
            $data['universities'] = $this->Community_model->get_universities();
            
            $data['header'] = 'admin/includes/header';
            $data['sidebar'] = 'admin/includes/sidebar';
            $data['main_content'] = 'admin/pages/edit_user';

            $this->load->view('main', $data);
        }
    }

    public function update_user($user_id){

        $this->form_validation->set_rules('firstname','First Name','alpha|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('lastname','Last Name','alpha|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('phone','Phone Number','exact_length[10]|numeric');
        $this->form_validation->set_rules('city','City','alpha|max_length[16]');

        $university_id = $this->input->post('select_university');
        $faculty_id = $this->input->post('select_faculty');
        $firstname = filter_var($this->input->post('firstname'), FILTER_SANITIZE_STRING);
        $lastname = filter_var($this->input->post('lastname'), FILTER_SANITIZE_STRING);
        $email = $this->input->post('email');
        $phone = filter_var($this->input->post('number'), FILTER_SANITIZE_STRING);
        $city = filter_var($this->input->post('city'), FILTER_SANITIZE_STRING);

        if ($this->form_validation->run() === FALSE){

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

            if($this->User_model->check_account_study_updated($user_id)){

                if($this->Admin_model->update_user($user_id, $firstname, $lastname,$email, $phone, $city, $university_id, $faculty_id)){

                    $this->session->set_tempdata('user_updated','Account information updated successfuly', 1);
    
                    redirect(base_url() . 'admin/Admin/search_users');
    
                }else{
    
                    $this->session->set_tempdata('error_happend','Some error happend', 1);
                            
                    redirect(base_url() . 'admin/Admin/search_users');
                }

            }else{

                if($this->Admin_model->update_full_user($user_id, $firstname, $lastname,$email, $phone, $city, $university_id, $faculty_id)){

                    $this->session->set_tempdata('user_updated','Account information updated successfuly', 1);
    
                    redirect(base_url() . 'admin/Admin/search_users');
    
                }else{
    
                    $this->session->set_tempdata('error_happend','Some error happend', 1);
                            
                    redirect(base_url() . 'admin/Admin/search_users');
                }

            }
                    
        }
    }

    public function delete_user($user_id){

        if($this->Admin_model->delete_user($user_id)){

            $this->session->set_tempdata('user_deleted','User deleted successfuly', 1);

            redirect(base_url() . 'admin/Admin/search_users');

        }else{

            $this->session->set_tempdata('error_happend','Some error happend', 1);
                        
            redirect(base_url() . 'admin/Admin/search_users');
        }
    }

    public function restrict_account($user_id){

        if($this->Admin_model->restrict_account($user_id)){

            $this->session->set_tempdata('user_restricted','User restricted successfuly', 1);

            redirect(base_url() . 'admin/Admin/restrict_accounts');

        }else{

            $this->session->set_tempdata('error_happend','Some error happend', 1);
                        
            redirect(base_url() . 'admin/Admin/restrict_accounts');
        }
    }

    public function un_restrict_account($user_id){

        if($this->Admin_model->un_restrict_account($user_id)){

            $this->session->set_tempdata('user_un_restricted','User Activated successfuly', 1);

            redirect(base_url() . 'admin/Admin/restrict_accounts');

        }else{

            $this->session->set_tempdata('error_happend','Some error happend', 1);
                        
            redirect(base_url() . 'admin/Admin/restrict_accounts');
        }
    }

    public function view_report($report_id){

        $data['report'] = $this->Admin_model->get_report($report_id);

        $data['header'] = 'admin/includes/header';
        $data['sidebar'] = 'admin/includes/sidebar';
        $data['main_content'] = 'admin/pages/view_report';

        $this->load->view('main', $data);
    }

    public function view_edit_password($user_id){

        if($this->User_model->check_account_study_updated($user_id)){

            $data['user'] = $this->User_model->get_profile_after_study_activated($user_id);
            
            $data['header'] = 'admin/includes/header';
            $data['sidebar'] = 'admin/includes/sidebar';
            $data['main_content'] = 'admin/pages/edit_password';

            $this->load->view('main', $data);

        }else{

            $data['user'] = $this->User_model->get_profile($user_id);
            
            $data['header'] = 'admin/includes/header';
            $data['sidebar'] = 'admin/includes/sidebar';
            $data['main_content'] = 'admin/pages/edit_password';

            $this->load->view('main', $data);
        }
    }

    public function update_password($user_id){

        $this->form_validation->set_rules('newpass', 'Password', 'matches[confirmpass]');
        $this->form_validation->set_rules('confirmpass', 'Confirm Password', 'required');

        if ($this->form_validation->run() === FALSE){

            if($this->User_model->check_account_study_updated($user_id)){

                $data['user'] = $this->User_model->get_profile_after_study_activated($user_id);
                
                $data['header'] = 'admin/includes/header';
                $data['sidebar'] = 'admin/includes/sidebar';
                $data['main_content'] = 'admin/pages/edit_password';
    
                $this->load->view('main', $data);
    
            }else{
    
                $data['user'] = $this->User_model->get_profile($user_id);
                
                $data['header'] = 'admin/includes/header';
                $data['sidebar'] = 'admin/includes/sidebar';
                $data['main_content'] = 'admin/pages/edit_password';
    
                $this->load->view('main', $data);
            }

        }else{

            $password = $this->input->post('newpass');

            if($this->Admin_model->update_password($user_id, $password)){

                $this->session->set_tempdata('password_updated','User passoword updated successfuly', 1);

                redirect(base_url() . 'admin/Admin/view_user_form/' . $user_id);

            }else{

                $this->session->set_tempdata('error_happend','Some error happend', 1);
                        
                redirect(base_url() . 'admin/Admin/edit_password');
            }
        }
    }

    public function view_edit_api($user_id){
            
        if($this->User_model->check_account_study_updated($user_id)){

            $data['user'] = $this->User_model->get_profile_after_study_activated($user_id);
            
            $data['header'] = 'admin/includes/header';
            $data['sidebar'] = 'admin/includes/sidebar';
            $data['main_content'] = 'admin/pages/edit_API';

            $this->load->view('main', $data);

        }else{

            $data['user'] = $this->User_model->get_profile($user_id);
            
            $data['header'] = 'admin/includes/header';
            $data['sidebar'] = 'admin/includes/sidebar';
            $data['main_content'] = 'admin/pages/edit_API';

            $this->load->view('main', $data);
        }
    }

    public function update_API($user_id){

        $this->form_validation->set_rules('client_id', 'Client ID', 'exact_length[80]|is_unique[paypal_api.client_id]');
        $this->form_validation->set_rules('secret_key', 'Secret Key', 'exact_length[80]|is_unique[paypal_api.secret_key]');

        if ($this->form_validation->run() === FALSE){

            if($this->User_model->check_account_study_updated($user_id)){

                $data['user'] = $this->User_model->get_profile_after_study_activated($user_id);
                
                $data['header'] = 'admin/includes/header';
                $data['sidebar'] = 'admin/includes/sidebar';
                $data['main_content'] = 'admin/pages/edit_API';
    
                $this->load->view('main', $data);
    
            }else{
    
                $data['user'] = $this->User_model->get_profile($user_id);
                
                $data['header'] = 'admin/includes/header';
                $data['sidebar'] = 'admin/includes/sidebar';
                $data['main_content'] = 'admin/pages/edit_API';
    
                $this->load->view('main', $data);
            }

        }else{

            $client_id = $this->input->post('client_id');
            $secret_key = $this->input->post('secret_key');

            if($this->Admin_model->update_API($user_id, $client_id, $secret_key)){

                $this->session->set_tempdata('api_updated','User API updated successfuly', 1);

                redirect(base_url() . 'admin/Admin/view_user_form/' . $user_id);

            }else{

                $this->session->set_tempdata('error_happend','Some error happend', 1);
                        
                redirect(base_url() . 'admin/Admin/edit_API');
            }
        }
    }
}