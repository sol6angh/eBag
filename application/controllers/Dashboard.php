<?php

class Dashboard extends CI_Controller{

    public function __construct(){

        parent::__construct();
        
        if(!$this->session->logged_in){

            redirect(base_url() . 'View/view_pages/login');
        }
    }

    public function view_dashboard($name){

        $data['title'] = 'Dashboard';

        if($name == 'dashboard'){

            $data['materials'] = $this->Document_model->count_materials($this->session->id);
            $data['orders'] = $this->User_model->count_orders($this->session->id);
            $data['balance'] = $this->User_model->get_balance($this->session->id);

            $data['header'] = 'public/includes/header_dashboard';
            $data['main_content'] = 'public/pages/dashboard/' . $name;
            $data['footer'] = 'public/includes/footer_dashboard';

            $this->load->view('main', $data);

        }elseif($name == 'set_payment'){

            $data['user'] = $this->User_model->get_user_info_by_id($this->session->id);

            $data['header'] = 'public/includes/header_dashboard';
            $data['sidebar'] = 'public/includes/sidebar_dashboard';
            $data['main_content'] = 'public/pages/dashboard/' . $name;

            $this->load->view('main', $data);

        }else{

            $data['header'] = 'public/includes/header_dashboard';
            $data['sidebar'] = 'public/includes/sidebar_dashboard';
            $data['main_content'] = 'public/pages/dashboard/' . $name;

            $this->load->view('main', $data);
        }

    }

    public function manage_materials($user_id){

        $data['title'] = 'Dashboard';

        if($this->session->id == $user_id){

            $data['my_materials'] = $this->Document_model->manage_materials($user_id);

            $data['header'] = 'public/includes/header_dashboard';
            $data['sidebar'] = 'public/includes/sidebar_dashboard';
            $data['main_content'] = 'public/pages/dashboard/manage_materials';

            $this->load->view('main', $data);

        }else{

            redirect(base_url() . 'Dashboard/view_dashboard/dashboard');
        }
    }

    public function manage_orders($user_id){

        $data['title'] = 'Dashboard';

        if($this->session->id == $user_id){

            $data['orders'] = $this->User_model->manage_orders($user_id);

            $data['header'] = 'public/includes/header_dashboard';
            $data['sidebar'] = 'public/includes/sidebar_dashboard';
            $data['main_content'] = 'public/pages/dashboard/manage_orders';

            $this->load->view('main', $data);

        }else{

            redirect(base_url() . 'Dashboard/view_dashboard/dashboard');
        }
    }

    public function display_balance($user_id){

        $data['title'] = 'Dashboard';

        if($this->session->id == $user_id){

            $data['user'] = $this->User_model->get_user_info_by_id($user_id);

            $data['header'] = 'public/includes/header_dashboard';
            $data['sidebar'] = 'public/includes/sidebar_dashboard';
            $data['main_content'] = 'public/pages/dashboard/display_balance';

            $this->load->view('main', $data);

        }else{

            redirect(base_url() . 'Dashboard/view_dashboard/dashboard');
        }
    }

    public function help($user_id){

        $data['title'] = 'Dashboard';

        if($this->session->id == $user_id){

            $data['header'] = 'public/includes/header_dashboard';
            $data['sidebar'] = 'public/includes/sidebar_dashboard';
            $data['main_content'] = 'public/pages/dashboard/help';

            $this->load->view('main', $data);

        }else{

            redirect(base_url() . 'Dashboard/view_dashboard/dashboard');
        }
    }

    public function set_payment(){

        $this->form_validation->set_rules('id', 'Client ID', 'exact_length[80]|is_unique[paypal_api.client_id]');
        $this->form_validation->set_rules('key', 'Secret Key', 'exact_length[80]|is_unique[paypal_api.secret_key]');

        if ($this->form_validation->run() === FALSE){

            $this->session->set_tempdata('error_set_payment','Invalid Credentials', 1);

            redirect(base_url() . 'Dashboard/view_dashboard/set_payment');

        }else{

            $client_id = $this->input->post('id');
            $secret_key = $this->input->post('key');
            $user_id = $this->session->id;

            if($this->User_model->check_api_activate($user_id)){

                $this->session->set_tempdata('error_insert','Sorry you already insert your credentials before, try edit your credentials please', 1);
    
                redirect(base_url() . 'Dashboard/view_dashboard/set_payment');

            }else{

                if($this->User_model->insert_api($user_id, $client_id, $secret_key)){

                    $this->User_model->activate_api($user_id);
    
                    $this->session->set_tempdata('api_inserted','Your credentials inserted successfuly, you can recieve your balance now', 1);
    
                    redirect(base_url() . 'Dashboard/view_dashboard/set_payment');
    
                }else{
    
                    $this->session->set_tempdata('error_happend','Some error happend', 1);
    
                    redirect(base_url() . 'Dashboard/view_dashboard/set_payment');
                }
            }
        }
    }

    public function delete_api(){

        if($this->User_model->delete_api($this->session->id)){

            $this->Document_model->make_all_documents_free($this->session->id);

            $this->session->set_tempdata('api_deleted','Your credentials deleted and payment method un-active now, recieving money stopped', 1);

            redirect(base_url() . 'Dashboard/view_dashboard/set_payment');

        }else{

            $this->session->set_tempdata('error_happend','Some error happend', 1);

            redirect(base_url() . 'Dashboard/view_dashboard/set_payment');
        }
    }

    public function edit_set_payment($user_id){

        $data['title'] = 'Dashboard';

        if($this->session->id == $user_id){

            $this->form_validation->set_rules('id', 'Client ID', 'exact_length[80]');
            $this->form_validation->set_rules('key', 'Secret Key', 'exact_length[80]|is_unique[paypal_api.secret_key]');

            if ($this->form_validation->run() === FALSE){

                $data['header'] = 'public/includes/header_dashboard';
                $data['sidebar'] = 'public/includes/sidebar_dashboard';
                $data['main_content'] = 'public/pages/dashboard/edit_set_payment';

                $this->load->view('main', $data);

            }else{

                $client_id = $this->input->post('id');
                $secret_key = $this->input->post('key');

                if($this->User_model->update_api($user_id, $client_id, $secret_key)){

                    $this->session->set_tempdata('api_updated','Your credentials updated successfuly', 1);

                    redirect(base_url() . 'Dashboard/view_dashboard/set_payment');

                }else{

                    $this->session->set_tempdata('error_happend','Some error happend', 1);

                    redirect(base_url() . 'Dashboard/view_dashboard/set_payment');
                }

            }

        }else{

            redirect(base_url() . 'Dashboard/view_dashboard/dashboard');
        }
    }

    public function view_add_material(){

        $data['title'] = 'Dashboard';

        $data['universities'] = $this->Community_model->get_universities();

        $data['header'] = 'public/includes/header_dashboard';
        $data['sidebar'] = 'public/includes/sidebar_dashboard';
        $data['main_content'] = 'public/pages/dashboard/add_material';

        $this->load->view('main', $data);
    }

    public function add_material(){

        $data['title'] = 'Dashboard';

        $this->form_validation->set_rules('title', 'Material Name', 'min_length[6]|max_length[40]');
        $this->form_validation->set_rules('description', 'Description', 'min_length[20]|max_length[300]');

        $university_id = $this->input->post('select_university');
        $faculty_id = $this->input->post('select_faculty');

        $add_material_info = array(
            'material_university_id' => $university_id,
            'material_faculty_id' => $faculty_id,
        );

        $this->session->set_userdata($add_material_info);


        if ($this->form_validation->run() === FALSE){

            $this->session->set_tempdata('error_insert_material','Error, material name should between 6-40 character, and description between 20-300 character', 1);

            redirect(base_url() . 'Dashboard/error_path_add_material');

        }else{

            $user_id = $this->session->id;
            $university_id = $this->input->post('select_university');
            $faculty_id = $this->input->post('select_faculty');
            $category_id = $this->input->post('select_category');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $cost = $this->input->post('set_payment');

            if($_FILES['image']['size'] > 0){

                $not_empty = true;

            }else{

                $not_empty = false;
            }

            if($cost == 'free'){

                $is_free = 1;
                $price;

                if($not_empty){

                    $new_file_name = $this->file_upload();

                    $new_image_name = $this->image_upload();

                    if($this->Document_model->add_material($user_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price, $new_file_name, $new_image_name)){

                        $this->session->set_tempdata('material_inserted','Your material inserted successfuly', 1);
                    
                        $this->session->unset_userdata($add_material_info);
                    
                        redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                    
                    }else{
                    
                        $this->session->set_tempdata('error_happend','Some error happend', 1);
                    
                        redirect(base_url() . 'Dashboard/error_path_add_material');
                    }

                }else{

                    $new_file_name = $this->file_upload();

                    $new_image_name = 'test.png';
                    
                    if($this->Document_model->add_material($user_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price, $new_file_name, $new_image_name)){

                        $this->session->set_tempdata('material_inserted','Your material inserted successfuly', 1);
                    
                        $this->session->unset_userdata($add_material_info);
                    
                        redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                    
                    }else{
                    
                        $this->session->set_tempdata('error_happend','Some error happend', 1);
                    
                        redirect(base_url() . 'Dashboard/error_path_add_material');
                    }
                }
                
                
  
            }else{

                if($this->User_model->check_api_activate($user_id)){

                    $is_free = 0;
                    $price = $this->input->post('enter_fees');

                    if($price != null){

                        if($not_empty){

                            $new_file_name = $this->file_upload();
        
                            $new_image_name = $this->image_upload();
        
                            if($this->Document_model->add_material($user_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price, $new_file_name, $new_image_name)){
        
                                $this->session->set_tempdata('material_inserted','Your material inserted successfuly', 1);
                            
                                $this->session->unset_userdata($add_material_info);
                            
                                redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                            
                            }else{
                            
                                $this->session->set_tempdata('error_happend','Some error happend', 1);
                            
                                redirect(base_url() . 'Dashboard/error_path_add_material');
                            }
        
                        }else{
        
                            $new_file_name = $this->file_upload();
        
                            $new_image_name = 'test.png';
                            
                            if($this->Document_model->add_material($user_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price, $new_file_name, $new_image_name)){
        
                                $this->session->set_tempdata('material_inserted','Your material inserted successfuly', 1);
                            
                                $this->session->unset_userdata($add_material_info);
                            
                                redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                            
                            }else{
                            
                                $this->session->set_tempdata('error_happend','Some error happend', 1);
                            
                                redirect(base_url() . 'Dashboard/error_path_add_material');
                            }
                        }

                    }else{

                        $this->session->set_tempdata('error_set_fees','Please set your fees befor', 1);

                        redirect(base_url() . 'Dashboard/error_path_add_material');
                    }

                }else{

                    $this->session->set_tempdata('error_set_api','Sorry, you can not set your fees before setting your credintials payment method first', 1);

                    redirect(base_url() . 'Dashboard/error_path_add_material');
                }
            }
        }
    }

    public function error_path_add_material(){

        $data['title'] = 'Dashboard';

        $university_id = $this->session->material_university_id;
        $faculty_id = $this->session->material_faculty_id;

        $data['faculties'] = $this->Community_model->get_faculties_based_on_university($university_id);
            
        $data['university'] = $this->Community_model->get_university_name($university_id);

        $data['categories'] = $this->Document_model->get_all_category();

        $data['header'] = 'public/includes/header_dashboard';
        $data['sidebar'] = 'public/includes/sidebar_dashboard';
        $data['main_content'] = 'public/pages/dashboard/add_material';

        $this->load->view('main', $data);
    }

    public function file_upload(){

        /* File upload configeration*/

        $target_dir = "./assets/files/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $file_name = basename($_FILES["file"]["name"],$file_type);
        $file_name = date('Y_m_d') . '_' . rand(1,999999);

        $new_file_name = $file_name . '.' . $file_type;

        $temp_name = $_FILES["file"]["tmp_name"];

        if ($_FILES["file"]["size"] > 50331648){
            
            $this->session->set_tempdata('error_file_size','Sorry, file size greater than 2MB', 1);

            redirect(base_url() . 'Dashboard/error_path_add_material');

        }else{

            if($file_type == "pdf" || $file_type == "zip" || $file_type == "rar"){

                if (move_uploaded_file($temp_name, $target_dir . $new_file_name)){

                    return $new_file_name;

                } else{

                    $this->session->set_tempdata('error_happend','Some error happend', 1);

                    redirect(base_url() . 'Dashboard/error_path_add_material');
                }

            }else{

                $this->session->set_tempdata('error_file_extension','Sorry, file extension should be .pdf , .zip ,or .rar', 1);

                redirect(base_url() . 'Dashboard/error_path_add_material');
            }
        }
    }

    public function image_upload(){

        /* Image upload configeration*/

        $image_dir = "./assets/img/users/";
        $target_image = $image_dir . basename($_FILES["image"]["name"]);
        $image_type = strtolower(pathinfo($target_image,PATHINFO_EXTENSION));

        $image_name = basename($_FILES["image"]["name"],$image_type);
        $image_name = 'image' . date('Y_m_d') . '_' . rand(1,999999);

        $new_image_name = $image_name . '.' . $image_type;

        $temp_image = $_FILES["image"]["tmp_name"];

        if ($_FILES["image"]["size"] > 2100000){

            $this->session->set_tempdata('error_image_size','Sorry, image size greater than 2MB', 1);

            redirect(base_url() . 'Dashboard/error_path_add_material');

        }else{

            if($image_type == "jpg" || $image_type == "jpeg" || $image_type == "png"){

                if (move_uploaded_file($temp_image, $image_dir . $new_image_name)){

                    return $new_image_name;

                }else{

                    $this->session->set_tempdata('error_happend','Some error happend', 1);

                    redirect(base_url() . 'Dashboard/error_path_add_material');
                }

            }else{

                $this->session->set_tempdata('error_image_extension','Sorry, image extension should be .jpg , .jpeg ,or .PNG', 1);

                redirect(base_url() . 'Dashboard/error_path_add_material');
            }
        }      
    }

    public function view_edit_material($document_id){

        $data['title'] = 'Dashboard';

        if($this->Document_model->check_material_belong_to_user($this->session->id, $document_id)){

            $data['universities'] = $this->Community_model->get_universities();

            $data['categories'] = $this->Document_model->get_all_category();

            $data['my_material'] = $this->Document_model->show_material($document_id);

            $data['header'] = 'public/includes/header_dashboard';
            $data['sidebar'] = 'public/includes/sidebar_dashboard';
            $data['main_content'] = 'public/pages/dashboard/edit_material';

            $this->load->view('main', $data);

        }else{

            redirect(base_url() . 'Dashboard/view_dashboard/dashboard');
        }
    }

    public function edit_material($document_id){

        $data['title'] = 'Dashboard';

        $this->form_validation->set_rules('title', 'Material Name', 'min_length[6]|max_length[40]');
        $this->form_validation->set_rules('description', 'Description', 'min_length[20]|max_length[300]');

        $university_id = $this->input->post('select_university');
        $faculty_id = $this->input->post('select_faculty');

        $edit_material_study = array(
            'material_university_id' => $university_id,
            'material_faculty_id' => $faculty_id,
        );

        $this->session->set_userdata($edit_material_study);


        if ($this->form_validation->run() === FALSE){

            $this->session->set_tempdata('error_update_material','Error, material name should between 6-40 character, and description between 20-300 character', 1);

            redirect(base_url() . 'Dashboard/view_edit_material/' . $document_id);

        }else{

            if($this->Document_model->check_material_belong_to_user($this->session->id, $document_id)){

                $my_material = $this->Document_model->show_material($document_id);

                $user_id = $this->session->id;
                $university_id = $this->input->post('select_university');
                $faculty_id = $this->input->post('select_faculty');
                $category_id = $this->input->post('select_category');
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $cost = $this->input->post('set_payment');

                if($_FILES['image']['size'] > 0){

                    $image_not_empty = true;

                }else{

                    $image_not_empty = false;
                }

                if($cost == 'free'){

                    $is_free = 1;
                    $price;

                    if($image_not_empty){

                        $old_image_path = './assets/img/users/' . $my_material->image;

                        if(unlink($old_image_path)){

                            $new_image_name = $this->image_upload();

                            if($this->Document_model->update_material($document_id, $user_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price, $new_image_name)){

                                $this->session->set_tempdata('material_updated','Your material updated successfuly', 1);
                                    
                                $this->session->unset_userdata($edit_material_study);
                                    
                                redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                                    
                            }else{
                                    
                                $this->session->set_tempdata('error_happend','Some error happend', 1);
                                    
                                redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                            }              

                        }else{

                            $this->session->set_tempdata('error_happend','Some error happend', 1);
                                
                            redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                        }

                    }else{

                        $new_image_name = $my_material->image;

                        if($this->Document_model->update_material($document_id, $user_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price, $new_image_name)){

                            $this->session->set_tempdata('material_updated','Your material updated successfuly', 1);
                                
                            $this->session->unset_userdata($edit_material_study);
                                
                            redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                                
                        }else{
                                
                            $this->session->set_tempdata('error_happend','Some error happend', 1);
                                
                            redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                        }
                    }
                    
                }else{

                    if($this->User_model->check_api_activate($user_id)){

                        $is_free = 0;
                        $price = $this->input->post('enter_fees');

                        if($price != null){

                            if($image_not_empty){

                                $old_image_path = './assets/img/users/' . $my_material->image;
        
                                if(unlink($old_image_path)){
        
                                    $new_image_name = $this->image_upload();
        
                                    if($this->Document_model->update_material($document_id, $user_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price, $new_image_name)){
        
                                        $this->session->set_tempdata('material_updated','Your material updated successfuly', 1);
                                            
                                        $this->session->unset_userdata($edit_material_study);
                                            
                                        redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                                            
                                    }else{
                                            
                                        $this->session->set_tempdata('error_happend','Some error happend', 1);
                                            
                                        redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                                    }              
        
                                }else{
        
                                    $this->session->set_tempdata('error_happend','Some error happend', 1);
                                        
                                    redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                                }
        
                            }else{
        
                                $new_image_name = $my_material->image;
        
                                if($this->Document_model->update_material($document_id, $user_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price, $new_image_name)){
        
                                    $this->session->set_tempdata('material_updated','Your material updated successfuly', 1);
                                        
                                    $this->session->unset_userdata($edit_material_study);
                                        
                                    redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                                        
                                }else{
                                        
                                    $this->session->set_tempdata('error_happend','Some error happend', 1);
                                        
                                    redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                                }
                            }

                        }else{

                            $this->session->set_tempdata('error_set_fees','Please set your fees befor', 1);

                            redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                        }

                    }else{

                        $this->session->set_tempdata('error_set_api','Sorry, you can not set your fees before setting your credintials payment method first', 1);

                        redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
                    }
                }

            }else{

                redirect(base_url() . 'Dashboard/view_dashboard/dashboard');
            }
        }
    }

    public function delete_material($document_id){

        $data['title'] = 'Dashboard';

        $user_id = $this->session->id;

        if($this->Document_model->check_material_belong_to_user($user_id, $document_id)){

            $my_material = $this->Document_model->show_material($document_id);
            
            $old_image_path = './assets/img/users/' . $my_material->image;
            $old_file_path = './assets/files/' . $my_material->file;

            if($this->Document_model->delete_material($document_id)){
                
                $this->session->set_tempdata('material_deleted','Material deleted successfuly', 1);

                redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);

            }else{

                $this->session->set_tempdata('error_happend','Some error happend', 1);
                                        
                redirect(base_url() . 'Dashboard/manage_materials/' . $user_id);
            }

        }else{

            redirect(base_url() . 'Dashboard/view_dashboard/dashboard');
        }
    }
}

