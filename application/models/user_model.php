<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, first, pass');
   $this -> db -> from('register');
   $this -> db -> where('first', $username);
   $this -> db -> where('pass', $password);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>