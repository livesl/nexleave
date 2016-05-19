<?php

class Register_ctrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('register_model');
    }

    function index() {

//Including validation library
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div style="color:red;" class="error">', '</div>');

//Validating Name Field
        $this->form_validation->set_rules('first', 'First Name', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('last', 'Last Name', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('tp', 'Phone Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('passmatch', 'Confirm Passwod', 'trim|required|min_length[1]|max_length[15]|matches[pass]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_register');
            $this->load->view('pages/register');
            $this->load->view('templates/footer');
        } else {
//        
//Setting values for tabel columns
            $data = array(
                'first' => $this->input->post('first'),
                'last' => $this->input->post('last'),
                'tp' => $this->input->post('tp'),
                'pass' => $this->input->post('pass'),
                'confirmpass' => $this->input->post('passmatch')
            );
//Transfering data to Model
            $this->register_model->form_insert($data);
            $data['message'] = 'Data Inserted Successfully';
//Loading View
            $this->load->view('templates/header_register');
            $this->load->view('pages/register', $data);
            $this->load->view('templates/footer');
        }
    }

}

?>