<?php

class View extends CI_Controller{

    public function view_pages($name = 'homepage'){

        $data['title'] = $name;

        if($name == 'search'){

            $data['title'] = $name;

            $data['universities'] = $this->Community_model->get_universities();

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/' . $name;
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);
            
        }elseif($name == 'homepage'){

            $data['title'] = $name;

            $data['header'] = 'public/includes/header_home';
            $data['main_content'] = 'public/pages/' . $name;
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);
            
        }elseif($name == 'signup' || $name == 'login'){

            $data['title'] = $name;

            $data['edited_header'] = $name;

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/' . $name;
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);
            
        }elseif($name == 'index'){

            $data['title'] = $name;

            $data['without_search_bar'] = $name;

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/' . $name;
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);      

        }elseif($name == 'validation'){

            $data['title'] = $name;

            $data['main_content'] = 'public/pages/' . $name;

            $this->load->view('main', $data);

        }elseif($name == 'restrict_page'){

            $data['main_content'] = 'public/pages/' . $name;

            $this->load->view('main', $data);

        }elseif($name == 'policy'){

            $data['main_content'] = 'public/pages/' . $name;

            $this->load->view('main', $data);

        }else{

            $data['title'] = $name;

            $data['header'] = 'public/includes/header_primary';
            $data['main_content'] = 'public/pages/' . $name;
            $data['footer'] = 'public/includes/footer';

            $this->load->view('main', $data);
        }
    }

}