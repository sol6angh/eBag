<?php

    if(isset($sidebar)){

        $this->load->view($header);
        $this->load->view($sidebar);
        $this->load->view($main_content);
        
    }elseif(isset($header) && isset($footer)){

        $this->load->view($header);
        $this->load->view($main_content);
        $this->load->view($footer);

    }else if(isset($header)){

        $this->load->view($header);
        $this->load->view($main_content);

    }else{
        $this->load->view($main_content);
    }
        