<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');
        //load the login model
        $this->load->model('login_model');
    }

    public function index() {
        //get the posted values
        $username = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");

        //set validations
        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE) {
            //validation fails
            $this->load->view('login_view');
        } else {
            //validation succeeds
            if ($this->input->post('btn_login') == "Login") {
                //check if username and password is correct
                $usr_result = $this->login_model->get_user($username, $password);
                if ($usr_result > 0) { //active user record is present
                    //set the session variables
                    $sessiondata = array(
                        'username' => $username,
                        'loginuser' => TRUE
                    );




                    $this->session->set_userdata('logged_in', $sessiondata);
//                    $data['username'] = $session_data['username'];
                    //  $data['message_display'] = $username;





                    $this->load->view('templates/header_admin');
                    $this->load->view('pages/admin');
                    $this->load->view('templates/footer');



                    //redirect("welcome/admin");
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('login/index');
                }
            } else {
                redirect('login/index');
            }
        }
    }

    public function unset_session_value() {
        $this->session->unset_userdata('loginuser');
        $this->load->view('login_view');
    }

    public function sendmail() {
        // the message
        $msg = "You have new request!";

// use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg, 70);

// send email
        mail("dalbsranawaka@gmail.com", "Approval of leave", $msg);
    }

    public function viewload() {
        $this->load->database();
        $this->load->helper('url');
        //$res = $this->db->get('leave')->result();
        $res = $this->db->query('SELECT
        `leave`.id,
        `leave`.reason,
        `leave`.leavedate_from,
        `leave`.startdate_half,
        `leave`.leavedate_to,
        `leave`.`status`,
        `leave`.`assign_person_name`,
        register.`first` as username
        

        FROM
        `leave`
        INNER JOIN register ON `leave`.user_id = register.id ORDER BY
`leave`.id DESC
')->result();

        $data_arr = array();
        $i = 0;
        foreach ($res as $r) {

            if ($r->status == "0") {

                $status = "Pending";
            } else {

                $status = "Approved";
            }


            $data_arr[$i]['id'] = $r->id;
            $data_arr[$i]['username'] = $r->username;
            $data_arr[$i]['assigname'] = $r->assign_person_name;
            $data_arr[$i]['reason'] = $r->reason;
            $data_arr[$i]['leavedate_from'] = $r->leavedate_from;
            $data_arr[$i]['leavedate_to'] = $r->leavedate_to;
            $data_arr[$i]['status'] = $status;

            $i++;
        }

        echo json_encode($data_arr);
    }

    public function viewloadforuser() {

        $this->load->database();
        $this->load->helper('url');
        //$res = $this->db->get('leave')->result();

        if (isset($this->session->userdata['logged_in'])) {
            $username = ($this->session->userdata['logged_in']['username']);
            //    $email = ($this->session->userdata['logged_in']['email']);
        }

        $res = $this->db->query('SELECT
`leave`.id,
`leave`.assign_person_name,
`leave`.reason,
`leave`.leavedate_from,
`leave`.leavedate_to,
`leave`.`status`
FROM
`leave` ,
register
WHERE
`leave`.user_id = register.id AND
register.`first` = ' . $username . '
ORDER BY
`leave`.id DESC
')->result();

        $data_arr = array();
        $i = 0;
        foreach ($res as $r) {

            if ($r->status == "0") {

                $status = "Pending";
            } else {

                $status = "Approved";
            }


            $data_arr[$i]['id'] = $r->id;

            $data_arr[$i]['assigname'] = $r->assign_person_name;
            $data_arr[$i]['reason'] = $r->reason;
            $data_arr[$i]['leavedate_from'] = $r->leavedate_from;
            $data_arr[$i]['leavedate_to'] = $r->leavedate_to;
            $data_arr[$i]['status'] = $status;

            $i++;
        }

        echo json_encode($data_arr);

//       $query = $this->db->query("SELECT * FROM leave");
//        echo "<tr><th>Name</th><th>Type</th><th></th></tr>";
//        foreach ($query->result()as $row) {
//            echo "<tr><td onClick='setid(" . $row['id'] . "," . $row['id'] . ")'>" . $row['reason'] . "</td><td>" . $row['reason'] . "</td><td ><input type='button' value='Delete' onClick='del(" . $row['id'] . ")'></td></tr>";
////            echo  $query->num_rows();
//            
//        }
    }

}
