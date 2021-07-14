<?php

class Document extends CI_Controller{

    public function get_materials($id){

        $data['category_id'] = $this->Document_model->get_category_by_id($id);

        $name = $this->Document_model->get_category_by_id($id);

        $data['title'] = 'All ' . $name->category_name;

        $data['heading'] = 'Latest ' . $name->category_name;

        $checked = $this->Document_model->is_available($id);

        if($checked){

            $data['materials'] = $this->Document_model->get_materials($id);

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/category';
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);
        }else{

            $data['no_materials'] = 'There are no any materials related to ' . '"'  . $name->category_name . '"';
            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/category';
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);
        }

    }

    public function show_material($document_id){

        $data['title'] = 'Show Material';

        $data['category_id'] = $this->Document_model->get_category_by_id($document_id);

        $data['show'] = $this->Document_model->show_material($document_id);

        $data['comments'] = $this->Document_model->show_comments($document_id);

        if($this->session->id){

                if($this->User_model->check_material_in_bag($this->session->id, $document_id)){

                    $data['material_in_bag'] = true;
    
                    if($this->Document_model->check_rating($document_id)){
    
                        $data['count'] = $this->Document_model->count_ratings($document_id);
            
                        $data['rating'] = $this->Document_model->get_ratings($document_id);
                        $data['header'] = 'public/includes/header_primary';
                        $data['main_content'] = 'public/pages/buy';
                        $data['footer'] = 'public/includes/footer';
            
                        $this->load->view('main', $data);
            
                    }else{
            
                        $data['header'] = 'public/includes/header_primary';
                        $data['main_content'] = 'public/pages/buy';
                        $data['footer'] = 'public/includes/footer';
            
                        $this->load->view('main', $data);
                    }
    
                }else{
    
                    if($this->Document_model->check_rating($document_id)){
    
                        $data['count'] = $this->Document_model->count_ratings($document_id);
            
                        $data['rating'] = $this->Document_model->get_ratings($document_id);
                        $data['header'] = 'public/includes/header_primary';
                        $data['main_content'] = 'public/pages/buy';
                        $data['footer'] = 'public/includes/footer';
            
                        $this->load->view('main', $data);
            
                    }else{
            
                        $data['header'] = 'public/includes/header_primary';
                        $data['main_content'] = 'public/pages/buy';
                        $data['footer'] = 'public/includes/footer';
            
                        $this->load->view('main', $data);
                    }
                }
        }else{

                if($this->Document_model->check_rating($document_id)){

                    $data['count'] = $this->Document_model->count_ratings($document_id);
        
                    $data['rating'] = $this->Document_model->get_ratings($document_id);
                    $data['header'] = 'public/includes/header_primary';
                    $data['main_content'] = 'public/pages/buy';
                    $data['footer'] = 'public/includes/footer';
        
                    $this->load->view('main', $data);
        
                }else{
        
                    $data['header'] = 'public/includes/header_primary';
                    $data['main_content'] = 'public/pages/buy';
                    $data['footer'] = 'public/includes/footer';
        
                    $this->load->view('main', $data);
                }

        }
    }

    public function search_by_number(){

        $data['title'] = 'Search By Number';

        $this->form_validation->set_rules('material_num','material number','required|exact_length[4]|integer');

        if ($this->form_validation->run() === FALSE){

            $data['universities'] = $this->Community_model->get_universities();

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/search';
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);

        }else{

            $number = $this->input->post('material_num');

            if($this->Document_model->check_material_number($number)){

                $data['search_number'] = $this->Document_model->get_by_number($number);

                $data['heading'] = '"' . $number . '"';

                $data['header'] = 'public/includes/header_primary';
                $data['main_content'] = 'public/pages/category';
                $data['footer'] = 'public/includes/footer';

                $this->load->view('main', $data);
            }else{

                $data['no_search_number'] = 'There is no material with this number ' . '"' . $number . '"';

                $data['header'] = 'public/includes/header_primary';
                $data['main_content'] = 'public/pages/category';
                $data['footer'] = 'public/includes/footer';

                $this->load->view('main', $data);
            }

        }
    }

    public function search_by_university(){

        $data['title'] = 'Search By University';

        $this->form_validation->set_rules('search_university','University Name','required');

        if ($this->form_validation->run() === FALSE)
                {
                    $data['header'] = 'public/includes/header_primary';
                    $data['main_content'] = 'public/pages/index';
                    $data['footer'] = 'public/includes/footer';

                    $this->load->view('main', $data);
                }
                else
                {
                    $university = $this->input->post('search_university');

                    if($this->Community_model->check_university_by_name($university)){

                        $data['universities_filters'] = $this->Community_model->get_universities_by_name($university);

                        $data['header'] = 'public/includes/header_primary';
                        $data['main_content'] = 'public/pages/universities';
                        $data['footer'] = 'public/includes/footer';

                        $this->load->view('main', $data);
                    }else{

                        $data['no_universities'] = 'There is no university such this name ' . '"' . $university . '"';

                        $data['header'] = 'public/includes/header_primary';
                        $data['main_content'] = 'public/pages/universities';
                        $data['footer'] = 'public/includes/footer';

                        $this->load->view('main', $data);
                    }
 
                }
    }

    public function get_materials_by_university($id){

        $data['title'] = 'University Materials';

        if($this->Document_model->check_material_by_university($id)){

            $data['university'] = $this->Community_model->get_university_name($id);

            $data['materials_university'] = $this->Document_model->get_materials_by_university($id);

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/category';
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);
        }else{

            $data['university'] = $this->Community_model->get_university_name($id);

            $data['no_materials_university'] = $this->Document_model->check_material_by_university($id);

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/category';
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);
        }

    }

    public function search_for_material(){

        $data['title'] = 'Search for Material';

        $keyword = $this->input->post('search_for_material');

        if($materials_id = $this->Document_model->check_search_for_material($keyword)){

            //echo "{$materials_id[0]->id}";die();

            $search = $this->Document_model->search_for_material($materials_id);

            /*$search_material_info = array(
                'document_id' => $search['id'],
                'document_number' => $search['number'],
                'title' => $search->title,
                'description' => $search->dscription,
                'is_free' => $search->is_free,
                'price' => $search->price,
                'category_name' => $search->category_name,
                'university_name' => $search->university_name,
                'faculty_name' => $search->faculty_name
            );*/

            $_SESSION['search'] = $search;

            $data['search_materials'] = $this->Document_model->search_for_material($materials_id);

            $data['keyword'] = $keyword;

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/category';
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);

        }else{

            $data['no_search_materials'] = 'There ara no any materials ralated to your keyword ' . '"' . $keyword . '"';

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/category';
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);
        }
    }

    public function get_materials_based_on_faculty(){

        $data['title'] = 'Materials Faculty';

        $faculty_id = $this->input->post('select_faculty');
        $university_id = $this->input->post('select_university');

        if($this->Document_model->check_material_by_faculty($faculty_id, $university_id)){

            $data['faculty_materials'] = $this->Document_model->get_materials_by_faculty($faculty_id, $university_id);

            $data['faculty'] = $this->Community_model->get_faculty($faculty_id);

            $data['university'] = $this->Community_model->get_university_name($university_id);

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/category';
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);

        }else{

            $data['no_faculty'] = $this->Community_model->get_faculty($faculty_id);

            $data['university'] = $this->Community_model->get_university_name($university_id);

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/category';
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);
        }
    }

}