<?php

class Upload extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index() {
        $this->load->view('upload');
    }

    public function save() {
        $this->do_upload();
    }

    private function do_upload() {

        if (isset($_POST['uploadsubmit'])) {

            if (is_uploaded_file($_FILES["pic"]["tmp_name"])) {

                move_uploaded_file($_FILES["pic"]["tmp_name"], "./uploads/" . $_FILES["pic"]["tmp_name"]);
            }
        }
    }

}

?>