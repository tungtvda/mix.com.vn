<?php


if(!defined('DIR')) require_once '../../config.php';
require_once DIR.'/model/booking_hotelService.php';

if (isset($_POST['id']))
{
    $string='';
    $Id = addslashes(strip_tags($_POST['id']));
    $data =booking_hotel_getById($Id);
    if(count($data)>0){
        booking_hotel_update_status($Id);
        echo 1;
    }else{
        echo 0;
    }
}
else{
    echo 0;
}