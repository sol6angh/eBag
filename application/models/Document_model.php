<?php

class Document_model extends CI_Model{

    public function get_category_by_id($id){

        $this->db->select('*');
        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row();
    }

    public function get_category_by_name($name){

        $this->db->select('*');
        $query = $this->db->get_where('categories', array('category_name' => $name));
        return $query->row();
    }

    public function get_all_category(){

        $query = $this->db->get('categories');

        return $query->result();
    }

    public function get_materials($id){

        $this->db->select('document.*, universities.university_name, faculty.faculty_name, categories.category_name');
        $this->db->from('document');
        $this->db->join('universities' , 'universities.id = document.university_id');
        $this->db->join('faculty' , 'faculty.id = document.faculty_id');
        $this->db->join('categories' , 'categories.id = document.category_id');
        $this->db->where(array('category_id' => $id, 'is_deleted' => 0));
        $this->db->order_by('uploaded_at', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function is_available($id){

        $query = $this->db->get_where('document', array('category_id' => $id, 'is_deleted' => 0));

        if($query->num_rows() > 0){

            return true;
        }else{

            return false;
        }
    }

    public function material_is_available($document_id){

        $query = $this->db->get_where('document', array('id' => $document_id, 'is_deleted' => 0));

        if($query->num_rows() == 1){

            return true;
        }else{

            return false;
        }
    }

    public function show_material($document_id){

        $this->db->select('document.*, universities.university_name, faculty.faculty_name, categories.category_name, users.username');
        $this->db->join('universities' , 'universities.id = document.university_id');
        $this->db->join('faculty' , 'faculty.id = document.faculty_id');
        $this->db->join('categories' , 'categories.id = document.category_id');
        $this->db->join('users' , 'users.id = document.user_id');
        $this->db->order_by('uploaded_at', 'DESC');
        $query = $this->db->get_where('document', array('document.id' => $document_id));

        return $query->row();
    }

    public function show_comments($id){

        $this->db->select('comments.*, users.username');
        $this->db->join('users', 'users.id = comments.user_id');
        $query = $this->db->get_where('comments', array('comments.document_id' => $id));

        return $query->result();
    }

    public function check_rating($id){

        $this->db->count_all_results('ratings');
        $this->db->from('ratings');
        $this->db->where('document_id', $id);
        $check = $this->db->count_all_results();

        if($check > 0){

            return true;

        }else{

            return false;
        }
    }

    public function count_ratings($id){

        $this->db->count_all_results('ratings');
        $this->db->from('ratings');
        $this->db->where('document_id', $id);
        return $this->db->count_all_results();
    }

    public function get_ratings($id){

        $array = array();

        for($i = 1 ; $i < 6 ; $i++){

            $this->db->count_all_results('ratings');
            $this->db->from('ratings');
            $this->db->where(array('document_id' => $id, 'star' => $i));
            $array[$i] = $this->db->count_all_results();
        }
        
        (float) $rating = (5*$array[5] + 4*$array[4] + 3*$array[3] + 2*$array[2] + 1*$array[1]) / ($array[5] + $array[4] + $array[3] + $array[2] + $array[1]);

        return number_format($rating, '1', '.', ' ');
        
    }

    public function check_material_number($number){

        $query = $this->db->get_where('document', array('number' => $number, 'is_deleted' => 0));

        if($query->num_rows() == 1){

            return true;
        }else{
            
            return false;
        }
    }

    public function get_by_number($number){

        $this->db->select('document.*, universities.university_name, faculty.faculty_name, categories.category_name');
        $this->db->from('document');
        $this->db->join('universities' , 'universities.id = document.university_id');
        $this->db->join('faculty' , 'faculty.id = document.faculty_id');
        $this->db->join('categories' , 'categories.id = document.category_id');
        $this->db->where(array('number' => $number));
        $this->db->order_by('uploaded_at', 'DESC');
        $query = $this->db->get();

        return $query->row();
    }

    public function get_materials_by_university($id){

        $this->db->select('document.*, universities.university_name, faculty.faculty_name, categories.category_name');
        $this->db->from('document');
        $this->db->join('universities' , 'universities.id = document.university_id');
        $this->db->join('faculty' , 'faculty.id = document.faculty_id');
        $this->db->join('categories' , 'categories.id = document.category_id');
        $this->db->where('document.university_id', $id);
        $this->db->order_by('uploaded_at', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function check_material_by_university($id){

        $query = $this->db->get_where('document', array('university_id' => $id, 'is_deleted' => 0));

        if($query->num_rows() > 0){

            return true;
        }else{
            
            return false;
        }
    }

    public function check_search_for_material($keyword){

        $this->db->select('id');
        $this->db->like('title', $keyword);
        $this->db->or_like('description', $keyword);
        $query = $this->db->get('document');
        

        if($query->num_rows() > 0){

            return $query->result_array();

        }else{
            
            return false;
        }
    }

    public function search_for_material($materials_id){

        $result = array();
        for ($i=0; $i < count($materials_id); $i++) {
            
            $document_id =  "{$materials_id[$i]['id']}";
           
            $this->db->select('document.*, universities.university_name, faculty.faculty_name, categories.category_name');
            $this->db->join('universities' , 'universities.id = document.university_id');
            $this->db->join('faculty' , 'faculty.id = document.faculty_id');
            $this->db->join('categories' , 'categories.id = document.category_id');
            $query = $this->db->get_where('document', array('document.id' => $document_id));

            $result[$i] = $query->result();
        }
        return $result;
        
    }

    public function check_material_by_faculty($faculty_id, $university_id){

        $query = $this->db->get_where('document', array('faculty_id' => $faculty_id, 'university_id' => $university_id, 'is_deleted' => 0));

        if($query->num_rows() > 0){

            return true;
        }else{
            
            return false;
        }
    }

    public function get_materials_by_faculty($faculty_id, $university_id){

        $this->db->select('document.*, universities.university_name, faculty.faculty_name, categories.category_name');
        $this->db->from('document');
        $this->db->join('universities' , 'universities.id = document.university_id');
        $this->db->join('faculty' , 'faculty.id = document.faculty_id');
        $this->db->join('categories' , 'categories.id = document.category_id');
        $this->db->where(array('document.faculty_id' => $faculty_id, 'document.university_id' => $university_id));
        $this->db->order_by('uploaded_at', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function insert_comment($user_id, $document_id, $comment){

        $this->db->insert('comments', array('user_id' => $user_id, 'document_id' => $document_id, 'comment' => $comment));

        return true;
    }

    public function count_materials($user_id){

        $this->db->count_all_results('document');
        $this->db->from('document');
        $this->db->where(array('user_id' => $user_id, 'is_deleted' => 0));
        $count = $this->db->count_all_results();

        return $count;
    }

    public function manage_materials($user_id){

        $this->db->select('document.*, universities.university_name, faculty.faculty_name, categories.category_name');
        $this->db->from('document');
        $this->db->join('universities' , 'universities.id = document.university_id');
        $this->db->join('faculty' , 'faculty.id = document.faculty_id');
        $this->db->join('categories' , 'categories.id = document.category_id');
        $this->db->where(array('document.user_id' => $user_id, 'document.is_deleted' => 0));
        $this->db->order_by('uploaded_at', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function add_material($user_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price, $new_file_name, $new_image_name){

        $data = array(
            'user_id' => $user_id,
            'university_id' => $university_id,
            'faculty_id' => $faculty_id,
            'category_id' => $category_id,
            'number' => rand(1000,9999),
            'title' => $title,
            'description' => $description,
            'image' => $new_image_name,
            'file' => $new_file_name,
            'is_free' => $is_free,
            'price' => $price,
        );

        $this->db->insert('document', $data);

        return true;
    }

    public function check_material_belong_to_user($user_id, $document_id){

        $query = $this->db->get_where('document', array('id' => $document_id, 'user_id' => $user_id));

        if($query->num_rows() > 0){

            return true;

        }else{

            return false;
        }
    }

    public function update_material($document_id, $user_id, $university_id, $faculty_id, $category_id, $title, $description, $is_free, $price, $new_image_name){

        $data = array(
            'user_id' => $user_id,
            'university_id' => $university_id,
            'faculty_id' => $faculty_id,
            'category_id' => $category_id,
            'title' => $title,
            'description' => $description,
            'image' => $new_image_name,
            'is_free' => $is_free,
            'price' => $price
        );

        $this->db->where(array('id' => $document_id));
        $this->db->update('document', $data);

        return true;
    }

    public function make_all_documents_free($user_id){

        $data = array(
            'is_free' => 1,
            'price' => null
        );

        $this->db->where(array('user_id' => $user_id));
        $this->db->update('document', $data);

        return true;
    }

    public function delete_material($document_id){

        $query = $this->db->get_where('bag', array('document_id' => $document_id));

        if($query->num_rows() >= 1){

            $this->db->where(array('id' => $document_id));
            $this->db->update('document', array('is_deleted' => 1));

            $this->db->delete('comments', array('document_id' => $document_id));
            $this->db->delete('ratings', array('document_id' => $document_id));

            return true;

        }else{

            $this->db->delete('document', array('id' => $document_id));
            $this->db->delete('comments', array('document_id' => $document_id));
            $this->db->delete('ratings', array('document_id' => $document_id));

            return true;
        } 
    }
}
