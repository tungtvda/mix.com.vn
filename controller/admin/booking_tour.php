<?php
require_once '../../config.php';
require_once DIR.'/model/booking_tourService.php';
require_once DIR.'/view/admin/booking_tour.php';
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
            $new_obj= new booking_tour();
            $new_obj->id=$_GET["id"];
            booking_tour_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/booking_tour.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=booking_tour_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/booking_tour.php');
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
            $List_booking_tour=booking_tour_getByAll();
            foreach($List_booking_tour as $booking_tour)
            {
                if(isset($_GET["check_".$booking_tour->id])) booking_tour_delete($booking_tour);
            }
            header('Location: '.SITE_NAME.'/controller/admin/booking_tour.php');
        }
    }
    if(isset($_POST["tour_id"])&&isset($_POST["name_tour"])&&isset($_POST["name_customer"])&&isset($_POST["language"])&&isset($_POST["phone"])&&isset($_POST["email"])&&isset($_POST["address"])&&isset($_POST["departure_day"])&&isset($_POST["adults"])&&isset($_POST["children_5_10"])&&isset($_POST["children_5"])&&isset($_POST["price"])&&isset($_POST["price_children"])&&isset($_POST["price_children_under_5"])&&isset($_POST["total_price"])&&isset($_POST["request"])&&isset($_POST["created"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['tour_id']))
       $array['tour_id']='0';
       if(!isset($array['name_tour']))
       $array['name_tour']='0';
       if(!isset($array['name_customer']))
       $array['name_customer']='0';
       if(!isset($array['language']))
       $array['language']='0';
       if(!isset($array['phone']))
       $array['phone']='0';
       if(!isset($array['email']))
       $array['email']='0';
       if(!isset($array['address']))
       $array['address']='0';
       if(!isset($array['departure_day']))
       $array['departure_day']='0';
       if(!isset($array['adults']))
       $array['adults']='0';
       if(!isset($array['children_5_10']))
       $array['children_5_10']='0';
       if(!isset($array['children_5']))
       $array['children_5']='0';
       if(!isset($array['price']))
       $array['price']='0';
       if(!isset($array['price_children']))
       $array['price_children']='0';
       if(!isset($array['price_children_under_5']))
       $array['price_children_under_5']='0';
       if(!isset($array['total_price']))
       $array['total_price']='0';
       if(!isset($array['request']))
       $array['request']='0';
       if(!isset($array['status']))
       $array['status']='0';
       if(!isset($array['created']))
       $array['created']='0';
      $new_obj=new booking_tour($array);
        if($insert)
        {
            booking_tour_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/booking_tour.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            booking_tour_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/booking_tour.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=booking_tour_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=booking_tour_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_booking_tour($data);
}
else
{
     header('location: '.SITE_NAME);
}
