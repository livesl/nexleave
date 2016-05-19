<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class viewapplyleave_ctrl extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');
        //load the login model
        // $this->load->model('login_model');
    }

    public function index() {

        $query = $this->db->query('SELECT id, reason FROM leave');

        foreach ($query->result() as $row) {
            echo $row->id;
            echo $row->reason;
           
        }

        echo 'Total Results: ' . $query->num_rows();

        echo "<tr><th>id</th><th>Reason</th><th></th></tr>";


        foreach ($sql as $row) {
            echo "<tr><td onClick='setid(" . $row['id'] . "," . $row['id'] . ")'>" . $row['reason'] . "</td><td>" . $row['reason'] . "</td><td ><input type='button' value='Delete' onClick='del(" . $row['id'] . ")'></td></tr>";
        }
    }

}
