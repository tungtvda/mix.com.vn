<?php
require_once '../../config.php';
require_once DIR.'/model/booking_hotelService.php';
require_once DIR.'/view/admin/booking_hotel.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
returnCountData();
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new booking_hotel();
            $new_obj->id=$_GET["id"];
            booking_hotel_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/booking_hotel.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=booking_hotel_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/booking_hotel.php');
        }
        else
        {
            $data['tab1_class']='default-tab current';
        }
    }
    else
    {
        $data['tab1_class']='default-tab current';
    }
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_booking_hotel=booking_hotel_getByAll();
            foreach($List_booking_hotel as $booking_hotel)
            {
                if(isset($_GET["check_".$booking_hotel->id])) booking_hotel_delete($booking_hotel);
            }
            header('Location: '.SITE_NAME.'/controller/admin/booking_hotel.php');
        }
    }
    if(isset($_POST["hotel_id"])&&isset($_POST["name_hotel"])&&isset($_POST["name_customer"])&&isset($_POST["phone"])&&isset($_POST["email"])&&isset($_POST["address"])&&isset($_POST["from_date"])&&isset($_POST["to_date"])&&isset($_POST["num_member"])&&isset($_POST["price"])&&isset($_POST["price_room"])&&isset($_POST["total_price"])&&isset($_POST["request"])&&isset($_POST["created"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['hotel_id']))
       $array['hotel_id']='0';
       if(!isset($array['name_hotel']))
       $array['name_hotel']='0';
       if(!isset($array['name_customer']))
       $array['name_customer']='0';
       if(!isset($array['phone']))
       $array['phone']='0';
       if(!isset($array['email']))
       $array['email']='0';
       if(!isset($array['address']))
       $array['address']='0';
       if(!isset($array['from_date']))
       $array['from_date']='0';
        if(!isset($array['to_date']))
            $array['to_date']='0';
       if(!isset($array['num_member']))
       $array['num_member']='0';
       if(!isset($array['price']))
       $array['price']='0';
       if(!isset($array['price_room']))
       $array['price_room']='0';
       if(!isset($array['total_price']))
       $array['total_price']='0';
       if(!isset($array['request']))
       $array['request']='0';
       if(!isset($array['status']))
       $array['status']='0';
       if(!isset($array['created']))
       $array['created']='0';
      $new_obj=new booking_hotel($array);
        if($insert)
        {
            booking_hotel_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/booking_hotel.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            booking_hotel_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/booking_hotel.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=booking_hotel_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=booking_hotel_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_booking_hotel($data);
}
else
{
     header('location: '.SITE_NAME);
}
