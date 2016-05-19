<?php

class name_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_username() {

        $this->db->select('id');
        $this->db->select('first');
        $this->db->from('register');
        $query = $this->db->get();
        $result = $query->result();
        
        //array to store  id &  name
        
        $user_id = array('-SELECT-');
        $user_name = array('-SELECT-');
        
        
        for ($i = 0; $i < count($result); $i++)
        {
            array_push($user_id, $result[$i]->id);
            array_push($user_name, $result[$i]->first);
        }
        return $user_result = array_combine($user_id, $user_name);
    }

}

?>