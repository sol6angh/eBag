<?php

class Admin_model extends CI_Model{

    public function check_admin_account($number, $password){

        $query = $this->db->get_where('admin', array('admin_num' => $number, 'password' => $password));

        if($query->num_rows() == 1){

            return true;

        }else{

            return false;
        }
    }

    public function get_admin_info($number, $password){

        $query = $this->db->get_where('admin', array('admin_num' => $number, 'password' => $password));

        return $query->row();
    }

    public function get_materials($limit){

        if($limit){

            $this->db->select('document.*, users.username, categories.category_name');
            $this->db->from('document');
            $this->db->join('categories' , 'categories.id = document.category_id');
            $this->db->join('users' , 'users.id = document.user_id');
            $this->db->limit(5);
            $this->db->where('document.is_deleted', 0);
            $this->db->order_by('uploaded_at', 'DESC');
            $query = $this->db->get();

            return $query->result();

        }else{

            $this->db->select('document.*, users.username, categories.category_name');
            $this->db->from('document');
            $this->db->join('categories' , 'categories.id = document.category_id');
            $this->db->join('users' , 'users.id = document.user_id');
            $this->db->where('document.is_deleted', 0);
            $this->db->order_by('uploaded_at', 'DESC');
            $query = $this->db->get();

            return $query->result();
        }
    }

    public function get_materials_deleted(){

        $this->db->select('document.*, users.username, categories.category_name');
        $this->db->from('document');
        $this->db->join('categories' , 'categories.id = document.category_id');
        $this->db->join('users' , 'users.id = document.user_id');
        $this->db->where('document.is_deleted', 1);
        $this->db->order_by('uploaded_at', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_orders($limit){

        if($limit){

            $this->db->select('orders.*');
            $this->db->from('orders');
            $this->db->limit(5);
            $this->db->order_by('order_date', 'DESC');
            $query = $this->db->get();

            return $query->result();

        }else{

            $this->db->select('orders.*, document.price');
            $this->db->from('orders');
            $this->db->join('document' , 'document.id = orders.document_id');
            $this->db->order_by('order_date', 'DESC');
            $query = $this->db->get();

            return $query->result();
        }
    }

    public function get_users($limit){

        if($limit){

            $this->db->select('*');
            $this->db->from('users');
            $this->db->limit(5);
            $this->db->order_by('created_at', 'DESC');
            $query = $this->db->get();

            return $query->result();

        }else{

            $this->db->select('*');
            $this->db->from('users');
            $this->db->order_by('created_at', 'DESC');
            $query = $this->db->get();

            return $query->result();
        }
    }

    public function get_reports(){

        $this->db->select('*');
        $this->db->from('contact');
        $this->db->order_by('time', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_material($document_id){

            $this->db->select('document.*, universities.university_name, faculty.faculty_name, categories.category_name');
            $this->db->from('document');
            $this->db->join('universities' , 'universities.id = document.university_id');
            $this->db->join('faculty' , 'faculty.id = document.faculty_id');
            $this->db->join('categories' , 'categories.id = document.category_id');
            $this->db->where('document.id', $document_id);
            $this->db->order_by('uploaded_at', 'DESC');
            $query = $this->db->get();

            return $query->row();
    }

    public function update_material($document_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price){

        $data = array(
            'university_id' => $university_id,
            'faculty_id' => $faculty_id,
            'category_id' => $category_id,
            'title' => $title,
            'description' => $description,
            'is_free' => $is_free,
            'price' => $price
        );

        $this->db->where(array('id' => $document_id));
        $this->db->update('document', $data);

        return true;
    }

    public function update_user($user_id, $firstname, $lastname, $email, $phone, $city, $university_id, $faculty_id){

        $data = array(
            'university_id' => $university_id,
            'faculty_id' => $faculty_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone_number' => $phone,
            'city' => $city
        );

        $this->db->where(array('id' => $user_id));
        $this->db->update('users', $data);

        return true;
    }

    public function update_full_user($user_id, $firstname, $lastname, $email, $phone, $city, $university_id, $faculty_id){

        $data = array(
            'university_id' => $university_id,
            'faculty_id' => $faculty_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone_number' => $phone,
            'city' => $city,
            'study_activate' => 1
        );

        $this->db->where(array('id' => $user_id));
        $this->db->update('users', $data);

        return true;
    }

    public function delete_user($user_id){

        $this->db->delete('users', array('id' => $user_id));

        return true;
    }

    public function restrict_account($user_id){

        $data = array(
            'is_restricted' => 1
        );

        $this->db->where(array('id' => $user_id));
        $this->db->update('users', $data);

        return true;
    }

    public function un_restrict_account($user_id){

        $data = array(
            'is_restricted' => 0
        );

        $this->db->where(array('id' => $user_id));
        $this->db->update('users', $data);

        return true;
    }

    public function get_report($report_id){

        $query = $this->db->get_where('contact', array('id' => $report_id));

        return $query->row();
    }

    public function update_password($user_id, $password){

        $data = array(
            'password' => $password
        );

        $this->db->where(array('id' => $user_id));
        $this->db->update('users', $data);

        return true;
    }

    public function update_API($user_id, $client_id, $secret_key){

        $data = array(
            'client_id' => $client_id,
            'secret_key' => $secret_key
        );

        $this->db->where(array('user_id' => $user_id));
        $this->db->update('paypal_api', $data);

        return true;
    }
}