<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from tbl_usrs
     function get_user($usr, $pwd)
     {
          $sql = "select * from register where first = '" . $usr . "' and pass = '" . $pwd . "'  ";
          $query = $this->db->query($sql);
          return $query->num_rows();
     }
     
     function get_user_id($id){
         $sql="select id from register where first = '" . $usr . "' and pass = '" . $pwd . "' ";
         $query=  $this->db->query($sql);
         return $query->num_rows();
         
     }
}?>