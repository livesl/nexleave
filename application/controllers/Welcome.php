<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('login_view');
  
    }

    public function register() {

        $this->load->view('templates/header_register');
        $this->load->view('pages/register');
        $this->load->view('templates/footer');
    }
    
     public function mydetails() {

        $this->load->view('templates/header_register');
        $this->load->view('pages/mydetails');
        $this->load->view('templates/footer');
    }

    public function admin() {
        
        
        $this->load->view('templates/header_admin');
        $this->load->view('pages/admin');
        $this->load->view('templates/footer');
    }

    public function applyleave() {

        $this->load->view('templates/header_leaveapply');
        $this->load->view('pages/applyleave');
        $this->load->view('templates/footer');
    }

    public function viewapplyleave() {
        $this->load->view('pages/viewapplyleave_1');
    }
     public function viewMyleave() {
        $this->load->view('pages/viewMyLeave');
    }

    public function ajax_load_data() {
        $this->load->database();
        $this->load->helper('url');
        $res = $this->db->get('register')->result();
        $data_arr = array();
        $i = 0;
        foreach ($res as $r) {
            $data_arr[$i]['id'] = $r->id;
            $data_arr[$i]['name'] = $r->first;
            $i++;
        }
        echo json_encode($data_arr);
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

//       $query = $this->db->query("SELECT * FROM leave");
//        echo "<tr><th>Name</th><th>Type</th><th></th></tr>";
//        foreach ($query->result()as $row) {
//            echo "<tr><td onClick='setid(" . $row['id'] . "," . $row['id'] . ")'>" . $row['reason'] . "</td><td>" . $row['reason'] . "</td><td ><input type='button' value='Delete' onClick='del(" . $row['id'] . ")'></td></tr>";
////            echo  $query->num_rows();
//            
//        }
    }

    public function changeStatus() {
        $id = $this->input->post('id');
        $this->load->database();
        $this->load->helper('url');

//        if (isset($this->session->welcome->viewload['id'])) {
//            $id = ($this->session->welcome->viewload['id']['id']);
//            //    $email = ($this->session->userdata['logged_in']['email']);
//        } else {
//            // header("location: login");
//        }



        $data = array(
            'status' => '1'
        );

        $this->db->where('id', $id);
        $this->db->update('leave', $data);
    }

    public function viewloadforusers() {
        $this->load->database();
        $this->load->helper('url');

        if (isset($this->session->userdata['logged_in'])) {
            $username = ($this->session->userdata['logged_in']['username']);
            //    $email = ($this->session->userdata['logged_in']['email']);
        } else {
            // header("location: login");
        }

     
        //$res = $this->db->get('leave')->result();
        $res = $this->db->query('SELECT
`leave`.id,
register.first as username,
`leave`.assign_person_name,
`leave`.reason,
`leave`.leavedate_from,
`leave`.leavedate_to,
`leave`.`status`
FROM
`leave`
INNER JOIN register ON `leave`.user_id = register.id
where
register.`first` = "'.$username.'" order by leave.id desc ')->result();

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
            
  }


}
