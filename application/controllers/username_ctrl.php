<?php

class username_ctrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        //load the user model

        $this->load->model('name_model');
    }

    function index() {

       
        $data['username'] = $this->name_model->get_username();
        $this->load->view('templates/header_leaveapply');
        $this->load->view('pages/applyleave',$data);
        $this->load->view('templates/footer');
    }

}

?>