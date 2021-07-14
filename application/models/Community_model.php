<?php

class Community_model extends CI_model{

    public function get_universities(){

        $query = $this->db->get('universities');

        return $query->result();
    }

    public function get_university_name($id){

        $query = $this->db->get_where('universities', array('id' => $id));

        return $query->row();
    }

    public function check_university_by_name($university){

        $this->db->select('*');
        $this->db->from('universities');
        $this->db->like('university_name', $university);
        $query = $this->db->get();

        if($query->num_rows() > 0){

            return true;
        }else{

            return false;
        }
    }

    public function get_universities_by_name($university){

        $this->db->select('*');
        $this->db->from('universities');
        $this->db->like('university_name', $university);
        $query = $this->db->get();

        return $query->result();
    }

    public function check_university_by_id($id){

        $query = $this->db->get_where('universities', array('id' => $id));

        if($query->num_rows() == 1){

            return true;
        }else{

            return false;
        }
    }

    public function get_university_by_id($id){

        $query = $this->db->get_where('universities', array('id' => $id));

        return $query->row();
    }

    public function get_faculties_based_on_university($university_id){

        $query = $this->db->get_where('faculty', array('university_id' => $university_id));

        return $query->result();
    }

    public function get_faculty($id){

        $query = $this->db->get_where('faculty', array('id' => $id));

        return $query->row();
    }

    public function get_chat($university_id){

        $this->db->select('chats.*, users.id, users.username');
        $this->db->join('users', 'users.id = chats.user_id');
        $query = $this->db->get_where('chats', array('chats.university_id' => $university_id));

        return $query->result();
    }

    public function check_chat($university_id){

        $query = $this->db->get_where('chats', array('university_id' => $university_id));

        if($query->num_rows() > 0){

            return true;
        }else{

            return false;
        }
    }

    public function insert_chat_message($user_id, $university_id, $message){

        $this->db->insert('chats', array('user_id' => $user_id, 'university_id' => $university_id, 'text' => $message));

        return true;
    }
}