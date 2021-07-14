<?php

class Authenticate extends CI_Controller{

    public function view_form(){

        $data['main_content'] = 'admin/pages/login';

        $this->load->view('main', $data);
    }

    public function login(){

        $this->form_validation->set_rules('number', 'Admin Number', 'required|exact_length[7]|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE){

            $data['main_content'] = 'admin/pages/login';

            $this->load->view('main', $data);

        }else{

            $number = $this->input->post('number');
            $password = $this->input->post('password');

            if($this->Admin_model->check_admin_account($number, $password)){

                $admin = $this->Admin_model->get_admin_info($number, $password);

                $admin_info = array(
                    'first_name' => $admin->firstname,
                    'last_name' => $admin->lastname,
                    'number' => $admin->admin_num,
                    'logged_in_admin' => true
                );

                $this->session->set_userdata($admin_info);

                redirect(base_url() . 'admin/Admin/index');

            }else{

                $this->session->set_tempdata('admin_error','Admin information not found', 1);

                redirect(base_url() . 'admin/Authenticate/view_form');
            }
        }
    }

    public function logout(){

        $this->session->unset_userdata($admin_info);

        redirect(base_url() . 'admin/Authenticate/view_form');
    }
}