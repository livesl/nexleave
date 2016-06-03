<?php

function base64_image_upload($data)
{

    $ci =& get_instance();

    $ci->load->library('pbkdf2');
    $random_string = $ci->pbkdf2->generate_random_string(10);

    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

    $extension ='.'.substr($type, strpos($type, "/") + 1);

    $image_name=$random_string.$extension;

    $success=file_put_contents('./assets/img/uploads/cache/'.$image_name, $data);

    //if($success==false){return 0;}
    //else {
    //    return $image_name;
    //}

    if($success!=false)return $image_name;
    else return false;

}

