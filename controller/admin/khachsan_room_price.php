<?php
require_once '../../config.php';
require_once DIR.'/model/khachsan_room_priceService.php';
require_once DIR.'/model/khachsanService.php';
require_once DIR.'/view/admin/khachsan_room_price.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if( $_SESSION["Quyen"]==1) {
    returnCountData();
}
if(isset($_SESSION["Admin"]))
{
    $danhmuc_id_get='';
    if(isset($_GET['danhmuc_id'])&&$_GET['danhmuc_id']!=''){
        $danhmuc_id_get='?danhmuc_id='.$_GET['danhmuc_id'];
    }
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            if( $_SESSION["Quyen"]==1) {
                $new_obj = new khachsan_room_price();
                $new_obj->id = $_GET["id"];
                khachsan_room_price_delete($new_obj);
            }
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php'.$danhmuc_id_get);
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=khachsan_room_price_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
                $danhmuc_id=$new_obj[0]->danhmuc_id;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php'.$danhmuc_id_get);
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
    $data['listfkey']['danhmuc_id']=khachsan_getByAll();
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            if( $_SESSION["Quyen"]==1) {
                $List_khachsan_room_price = khachsan_room_price_getByAll();
                foreach ($List_khachsan_room_price as $khachsan_room_price) {
                    if (isset($_GET["check_" . $khachsan_room_price->id])) khachsan_room_price_delete($khachsan_room_price);
                }
            }
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php');
        }
    }
    if(isset($_POST["danhmuc_id"])&&isset($_POST["name"])&&isset($_POST["img"])&&isset($_POST["description"])&&isset($_POST["dichvu"])&&isset($_POST["price"])&&isset($_POST["amount_people"])&&isset($_POST["amount_room"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['danhmuc_id']))
       $array['danhmuc_id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['img']))
       $array['img']='0';
       if(!isset($array['description']))
       $array['description']='0';
       if(!isset($array['dichvu']))
       $array['dichvu']='0';
       if(!isset($array['price']))
       $array['price']='0';
       if(!isset($array['amount_people']))
       $array['amount_people']='0';
       if(!isset($array['amount_room']))
       $array['amount_room']='0';

      $new_obj=new khachsan_room_price($array);
        if($insert)
        {
            if( $_SESSION["Quyen"]==1) {
                khachsan_room_price_insert($new_obj);
            }
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php'.$danhmuc_id_get);
        }
        else
        {
            $new_obj->id=$_GET["id"];
            if( $_SESSION["Quyen"]==1) {
                khachsan_room_price_update($new_obj);
            }


            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php'.$danhmuc_id_get);
        }
    }
    else{
        if(isset($_POST["amount_people"])&&isset($_POST["amount_room"]))
        {
            if($insert==false)
            {
                $array=$_POST;

                if(!isset($array['amount_people']))
                    $array['amount_people']=1;
                if(!isset($array['amount_room']))
                    $array['amount_room']=1;
                if($_POST['amount_people']==0||$_POST['amount_people']=='')
                {
                    $array['amount_people']=1;
                }
                if($_POST['amount_room']==0||$_POST['amount_room']=='')
                {
                    $array['amount_room']=1;
                }
                if($_SESSION["khach_san_id"]==$danhmuc_id)
                {
                    $new_obj=new khachsan_room_price($array);
                    $new_obj->id=$_GET["id"];
                    khachsan_room_price_update_hotel($new_obj);
                }

                header('Location: '.SITE_NAME.'/controller/admin/khachsan_room_price.php');
            }

        }

    }
    if( $_SESSION["Quyen"]==1){
        $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';

        $dk='';
        $dk_count='';
        if(isset($_GET['giatri'])&&$_GET['giatri']!=''){
            $key_timkiem=mb_strtolower(addslashes(strip_tags($_GET['giatri'])));
            $dk_count='name LIKE "%'.$key_timkiem.'%" or description LIKE "%'.$key_timkiem.'%" or dichvu LIKE "%'.$key_timkiem.'%" or price LIKE "%'.$key_timkiem.'%" ';
            $dk='(khachsan_room_price.name LIKE "%'.$key_timkiem.'%" or khachsan_room_price.description LIKE "%'.$key_timkiem.'%" or khachsan_room_price.dichvu LIKE "%'.$key_timkiem.'%" or khachsan_room_price.price LIKE "%'.$key_timkiem.'%" )';
        }
        if(isset($_GET['danhmuc_id'])&&$_GET['danhmuc_id']!=''){
            $danhmuc_id=mb_strtolower(addslashes(strip_tags($_GET['danhmuc_id'])));
            if($dk!='')
            {
                $dk.=' (and khachsan_room_price.danhmuc_id='.$danhmuc_id.')';
                $dk_count.=' and danhmuc_id='.$danhmuc_id;
            }
            else{
                $dk.='  khachsan_room_price.danhmuc_id='.$danhmuc_id.'';
                $dk_count.='  danhmuc_id='.$danhmuc_id;
            }

        }
        $data['count_paging']=khachsan_room_price_count($dk_count);
        $data['page']=isset($_GET['page'])?$_GET['page']:'1';
        $data['table_body']=khachsan_room_price_getByPagingReplace($data['page'],20,'id DESC',$dk);
    }else{
        $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
        $data['count_paging']=khachsan_room_price_count('danhmuc_id='.$_SESSION["khach_san_id"]);
        $data['page']=isset($_GET['page'])?$_GET['page']:'1';
        $data['table_body']=khachsan_room_price_getByPagingReplace($data['page'],20,'id DESC','khachsan_room_price.danhmuc_id='.$_SESSION["khach_san_id"]);
    }

    // gọi phương thức trong tầng view để hiển thị
    view_khachsan_room_price($data);
}
else
{
     header('location: '.SITE_NAME);
}
