<?php

class Register_ctrl extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('register_model');
    }

    function index() {

//Including validation library
        $this->load->library('form_validation');



//         if ($this->input->post('uploadsubmit')) {
//            
//            if (is_uploaded_file($_FILES["pic"]["tmp_name"])) {
//
//                move_uploaded_file($_FILES["pic"]["tmp_name"], "./uploads/" . $_FILES["pic"]["tmp_name"]);
//            }
//        }
        //  $this->do_upload();

        $this->form_validation->set_error_delimiters('<div style="color:red;" class="error">', '</div>');

//        Validating Name Field
        $this->form_validation->set_rules('first', 'First Name', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('last', 'Last Name', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('tp', 'Phone Number', 'trim|required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[1]|max_length[15]');
        $this->form_validation->set_rules('passmatch', 'Confirm Passwod', 'trim|required|min_length[1]|max_length[15]|matches[pass]');


        $imageuser = $this->input->post('imageuser');

        $filetmp = $_FILES[$imageuser]["tmp_name"];
        $filename = $_FILES[$imageuser]["name"];
        // $filetype = $_FILES[$imageuser]["type"];
        $filepath = "uploads/" .$filename;

        move_uploaded_file($filetmp, $filepath);




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
                'confirmpass' => $this->input->post('passmatch'),
                'basic_salory' => $this->input->post('basic_salory'),
                'education_qualifications' => $this->input->post('eduqlf'),
                'professional_qualifications' => $this->input->post('proqlf'),
                'image' => $filepath,
                'nic' => $this->input->post('nic'),
                'dob' => $this->input->post('dob'),
                'status' => "1"
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

//    function do_upload() {
//
//        if ($this->input->post('uploadsubmit')) {
//            
//            if (is_uploaded_file($_FILES["pic"]["tmp_name"])) {
//
//                move_uploaded_file($_FILES["pic"]["tmp_name"], "./uploads/" . $_FILES["pic"]["tmp_name"]);
//            }
//        }
//    }
}

?>