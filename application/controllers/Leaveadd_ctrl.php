<?php

class leaveadd_ctrl extends CI_Controller {

//    function __construct() {
//        parent::__construct();
//        $this->load->model('leaveadd_model');
//    }

    function index() {

        $this->load->database();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div style="color:red;" class="error">', '</div>');
        $this->form_validation->set_rules('reason', 'Reason', 'trim|required|min_length[1]|max_length[30]');


//        if ($this->form_validation->run() == FALSE) {
//            $this->load->view('templates/header_leaveapply');
//            $this->load->view('pages/applyleave');
//            $this->load->view('templates/footer');
//           
//        } else {


        $checked = $this->input->post('halftime');

        if (isset($checked) == NULL) {

            $halftime = "0";
        } else {
            $halftime = "1";
        }


        if (isset($this->session->userdata['logged_in'])) {
            $username = ($this->session->userdata['logged_in']['username']);
            $sql = "select id from register where first = '" . $username . "' ";
            $query = $this->db->query($sql);

            foreach ($query->result() as $value) {
                $user_id = $value->id;
            }
        }





        $data = array(
            'user_id' => $user_id,
            'assign_person_name' => $this->input->post('assignperson'),
            'reason' => $this->input->post('reason'),
            'leavedate_from' => $this->input->post('datepickerfrom'),
            'startdate_half' => $halftime,
            'leavedate_to' => $this->input->post('datepickerto'),
            'status' => "0"
        );

        $this->db->insert('leave', $data);


        $data['message'] = 'Data Inserted Successfully';

//        echo site_url('welcome/applyleave');

        $this->load->view('templates/header_admin');
        $this->load->view('pages/admin', $data);
        $this->load->view('templates/footer');
        
        
        
    }

//        $this->load->database();
//        
//        $userid = $_POST['userid'];
//        $assignid= $_POST['assignid'];
//        $reason= $_POST['reason'];
//        $leavedate= $_POST['leavedate'];
//        $half= $_POST['half'];
//        $leaveto= $_POST['leaveto'];
//        $status= $_POST['status'];
//        
//        $sql = "INSERT INTO leave(user_id,assign_person_id,reason,leavedate_from,startdate_half,leavedate_to,status)"
//                . " VALUES(" . $userid . ",'" . $assignid . "','" . $reason . "','" . $leavedate . "','".$half."','".$leaveto."','".$status."')";
//        
//        $this->db->query($sql);
}

//}
?>