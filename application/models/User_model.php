<?php

class User_model extends CI_Model{

    public function create_user($firstname, $lastname, $username, $email, $password){

        $secure_code = $this->generate_secure_code();

        $query = $this->db->insert('users', array(
                                            'firstname' => $firstname,
                                            'lastname' => $lastname, 
                                            'username' => $username, 
                                            'email' => $email, 
                                            'password' => $password,
                                            'secure_code' => $secure_code
                                                    ));
        
        return $secure_code;
    }

    public function validate_code($code){

        $query = $this->db->get_where('users', array('secure_code' => $code));

        if($query->num_rows() == 1){

            return true;
        }else{

            return false;
        }
    }

    public function get_user_by_code($code){

        $query = $this->db->get_where('users', array('secure_code' => $code));

        return $query->row();
    }

    public function activate_user($code){

        $updated_info = array('secure_code' => 0, 'is_activate' => 1);

        $this->db->update('users', $updated_info, array('secure_code' => $code));

        return true;
    }

    public function catch_id($username){

        $query = $this->db->get_where('users', array('username' => $username));

        return $query->row();
    }

    function send_email($email, $secure_code){

        $this->email->from('myebaghelp@gmail.com', 'My e-bag Support');
        $this->email->to($email);

        $this->email->subject('Activation Account');
        $this->email->message('Use this confirmation code to activate your account
The code: ' . $secure_code);

        $this->email->send();
    }

    public function update_secure_code_for_user($user_id, $secure_code){

        $this->db->where('id', $user_id);

        $this->db->update('users', array('secure_code' => $secure_code));

        return true;
    }

    public function get_user_info_by_id($user_id){

        $query = $this->db->get_where('users', array('id' => $user_id));

        return $query->row();
    }

    public function update_code_by_id($id){

        $secure_code = $this->generate_secure_code();

        $updated_code = array('secure_code' => $secure_code);

        $this->db->update('users', $updated_code, array('id' => $id));

        return true;
    }

    function generate_secure_code(){

        $secure_code = rand(1000,9999);

        return $secure_code;
    }

    public function check_user_info($username_email, $password){

        $query = $this->db->get_where('users', array('username' => $username_email, 'password' => $password));

        if($query->num_rows() > 0){
  
            return true;

        }else{

            $query = $this->db->get_where('users', array('email' => $username_email, 'password' => $password));
            
            if($query->num_rows() > 0){
  
                return true;

            }else{

                return false;
            }
        }
    }

    public function get_user_info_by_email($email, $password){

        $this->db->where(array('email' => $email, 'password' => $password));
        $query = $this->db->get('users');

        return $query->row();
    }

    public function get_user_info_by_username($username, $password){

        $this->db->where(array('username' => $username, 'password' => $password));
        $query = $this->db->get('users');

        return $query->row();
    }

    public function is_activate($id){

        $query = $this->db->get_where('users', array('id' => $id, 'is_activate' => 1));

        if($query->num_rows() == 1){

            return true;

        }else{

            return false;
        }
    }

    public function get_orders($id){

        $this->db->select('orders.document_id, orders.transaction_id, orders.order_date, document.*, categories.category_name, users.username');
        $this->db->join('document', 'document.id = orders.document_id');
        $this->db->join('categories', 'categories.id = document.category_id');
        $this->db->join('users', 'users.id = document.user_id');
        $this->db->order_by('orders.order_date', 'DESC');
        $query = $this->db->get_where('orders', array('orders.buyer_id' => $id));

        return $query->result();
    }

    public function get_order($id, $document_id){

        $this->db->select('orders.document_id, orders.transaction_id, orders.order_date, document.*, categories.category_name, users.username');
        $this->db->join('document', 'document.id = orders.document_id');
        $this->db->join('categories', 'categories.id = document.category_id');
        $this->db->join('users', 'users.id = document.user_id');
        $this->db->order_by('orders.order_date', 'DESC');
        $query = $this->db->get_where('orders', array('orders.buyer_id' => $id));

        return $query->result();
    }

    public function check_orders($id){

        $query = $this->db->get_where('orders', array('buyer_id' => $id));

        if($query->num_rows() > 0){

            return true;

        }else{

            return false;
        }
    }

    public function insert_order($buyer_id, $document_id, $seller_id){

        $data = array(
            'buyer_id' => $buyer_id,
            'document_id' => $document_id,
            'seller_id' => $seller_id,
            'transaction_id' => strtoupper(uniqid())
        );

        $this->db->insert('orders', $data);

        return true;
    }

    public function insert_order_after_payment($buyer_id, $document_id, $seller_id, $transaction_id){

        $data = array(
            'buyer_id' => $buyer_id,
            'document_id' => $document_id,
            'seller_id' => $seller_id,
            'transaction_id' => $transaction_id
        );

        $this->db->insert('orders', $data);

        return true;
    }

    public function get_profile($id){

        $query = $this->db->get_where('users', array('id' => $id));

        return $query->row();
    }

    public function update_account($id, $firstname, $lastname, $phone, $city){

        $data = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone_number' => $phone,
            'city' => $city
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);

        return true;
    }

    public function update_university_and_faculty($id, $university_id, $faculty_id){

        $data = array(
            'university_id' => $university_id,
            'faculty_id' => $faculty_id,
            'study_activate' => 1
        );

        $this->db->where('id', $id);
        $this->db->update('users', $data);

        return true;
    }

    public function get_profile_after_study_activated($id){

        $this->db->select('users.*, universities.university_name, faculty.faculty_name');
        $this->db->join('universities', 'universities.id = users.university_id');
        $this->db->join('faculty', 'faculty.id = users.faculty_id');
        $query = $this->db->get_where('users', array('users.id' => $id));

        return $query->row();
    }

    public function check_account_study_updated($id){

        $query = $this->db->get_where('users', array('id' => $id, 'study_activate' => 1));

        if($query->num_rows() == 1){

            return true;

        }else{

            return false;
        }
    }

    public function check_bag_items($user_id){

        $query = $this->db->get_where('bag', array('user_id' => $user_id));

        if($query->num_rows() > 0){

            return true;

        }else{

            return false;
        }
    }

    public function check_material_in_bag($user_id, $document_id){

        $query = $this->db->get_where('bag', array('user_id' => $user_id, 'document_id' => $document_id));

        if($query->num_rows() == 1){

            return true;

        }else{

            return false;
        }
    }

    public function get_my_bag($user_id){

        $this->db->select('bag.is_rating, document.*, universities.university_name, faculty.faculty_name, categories.category_name, users.username');
        $this->db->join('document' , 'document.id = bag.document_id');
        $this->db->join('universities' , 'universities.id = document.university_id');
        $this->db->join('faculty' , 'faculty.id = document.faculty_id');
        $this->db->join('categories' , 'categories.id = document.category_id');
        $this->db->join('users' , 'users.id = document.user_id');
        $this->db->order_by('bag.id', 'DESC');
        $query = $this->db->get_where('bag', array('bag.user_id' => $user_id));

        return $query->result();
    }

    public function insert_material_to_bag($user_id, $document_id){

        $this->db->insert('bag', array('user_id' => $user_id, 'document_id' => $document_id, 'is_rating' => 0));

        return true;
    }

    public function insert_rating($user_id, $document_id, $rating){

        $this->db->insert('ratings', array('user_id' => $user_id, 'document_id' => $document_id, 'star' => $rating));

        return true;
    }

    public function activate_rating($user_id, $document_id){

        $this->db->where(array('user_id' => $user_id, 'document_id' => $document_id));
        $this->db->update('bag', array('is_rating' => 1));

        return true;
    }

    public function check_oldpass_exist($user_id, $old_pass){

        $query = $this->db->get_where('users', array('id' => $user_id, 'password' => $old_pass));

        if($query->num_rows() == 1){

            return true;

        }else{

            return false;
        }
    }

    public function update_user_password($user_id, $new_pass){

        $this->db->where(array('id' => $user_id));
        $this->db->update('users', array('password' => $new_pass));

        return true;
    }

    public function delete_account($user_id){

        $this->db->delete('users', array('id' => $user_id));

        return true;
    }

    public function delete_all_info($user_id){

        $tables = array('bag', 'cart', 'chats', 'comments', 'document', 'orders');

        for($i = 0; $i < 6; $i++){

            $this->db->delete($tables[$i], array('user_id' => $user_id));
        }

        return true;
    }

    public function count_orders($user_id){

        $this->db->count_all_results('orders');
        $this->db->from('orders');
        $this->db->join('document', 'document.id = orders.document_id');
        $this->db->join('users', 'users.id = document.user_id');
        $this->db->where(array('users.id' => $user_id));
        $count = $this->db->count_all_results();

        return $count;
    }

    public function get_balance($user_id){

        $this->db->select('balance');
        $this->db->from('users');
        $this->db->where('id', $user_id);
        $query = $this->db->get();

        return $query->row();
    }

    public function manage_orders($user_id){

        $this->db->select('orders.document_id, orders.buyer_id, orders.order_date, document.*, categories.category_name, users.username');
        $this->db->join('document', 'document.id = orders.document_id');
        $this->db->join('categories', 'categories.id = document.category_id');
        $this->db->join('users', 'users.id = orders.buyer_id');
        $this->db->order_by('orders.order_date', 'DESC');
        $query = $this->db->get_where('orders', array('orders.seller_id' => $user_id));

        return $query->result();
    }

    public function insert_api($user_id, $client_id, $secret_key){

        $this->db->insert('paypal_api', array('user_id' => $user_id, 'client_id' => $client_id, 'secret_key' => $secret_key));

        return true;
    }

    public function activate_api($user_id){

        $this->db->where(array('id' => $user_id));
        $this->db->update('users', array('api_activate' => 1));

        return true;
    }

    public function delete_api($user_id){

        $this->db->delete('paypal_api', array('user_id' => $user_id));

        $this->db->where(array('id' => $user_id));
        $this->db->update('users', array('api_activate' => 0));

        return true;
    }

    public function check_api_activate($user_id){

        $query = $this->db->get_where('users', array('id' => $user_id, 'api_activate' => 1));

        if($query->num_rows() == 1){

            return true;

        }else{

            return false;
        }
    }

    public function update_api($user_id, $client_id, $secret_key){

        $this->db->where(array('user_id' => $user_id));
        $this->db->update('paypal_api', array('client_id' => $client_id, 'secret_key' => $secret_key));

        return true;
    }

    public function get_api($seller_id){

        $query = $this->db->get_where('paypal_api', array('user_id' => $seller_id));

        return $query->row();
    }

    public function check_balance_exist($seller_id){

        $query = $this->db->get_where('users', array('id' => $seller_id, 'balance_exist' => 1));

        if($query->num_rows() > 0){

            return true;

        }else{

            return false;
        }
    }

    public function add_balance($seller_id, $balance){

        $this->db->where(array('id' => $seller_id));
        $this->db->update('users', array('balance' => $balance, 'balance_exist' => 1));

        return true;
    }

    public function move_balance_to_prev($seller_id, $balance){

        $this->db->where(array('id' => $seller_id));
        $this->db->update('users', array('prev_balance' => $balance, 'balance' => 0));

        return true;
    }

    public function update_balance($seller_id, $new_balance){

        $this->db->where(array('id' => $seller_id));
        $this->db->update('users', array('balance' => $new_balance));

        return true;
    }

    public function insert_contact($user_id, $title, $email, $description){

        $this->db->insert('contact', array('user_id' => $user_id, 'title' => $title, 'email' => $email, 'description' => $description));

        return true;
    }

    public function is_restrict($user_id){

        $query = $this->db->get_where('users', array('is_restricted' => 1, 'id' => $user_id));

        if($query->num_rows() == 1){

            return true;
        }else{

            return false;
        }
    }

    public function contact_restrict($user_id, $email, $title, $description){

        $this->db->insert('contact', array('user_id' => $user_id, 'title' => $title, 'email' => $email, 'description' => $description));

        return true;
    }
}