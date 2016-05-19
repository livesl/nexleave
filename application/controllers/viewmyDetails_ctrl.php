<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class viewmyDetails_ctrl extends CI_Controller {

    public function viewmyDetails_ctrl() {


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
`leave`.startdate_half,
`leave`.leavedate_to,
`leave`.`status`
FROM
`leave`
INNER JOIN register ON `leave`.user_id = register.id
WHERE
register.`first` ="' . $username . '"  ORDER BY
`leave`.id DESC')->result();

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
