<?php
require_once '../../config.php';
require_once DIR.'/model/price_khachsanService.php';
require_once DIR.'/view/admin/price_khachsan.php';
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
            $new_obj= new price_khachsan();
            $new_obj->id=$_GET["id"];
            price_khachsan_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/price_khachsan.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=price_khachsan_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/price_khachsan.php');
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
            $List_price_khachsan=price_khachsan_getByAll();
            foreach($List_price_khachsan as $price_khachsan)
            {
                if(isset($_GET["check_".$price_khachsan->id])) price_khachsan_delete($price_khachsan);
            }
            header('Location: '.SITE_NAME.'/controller/admin/price_khachsan.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["value"])&&isset($_POST["position"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['value']))
       $array['value']='0';
       if(!isset($array['position']))
       $array['position']='0';
      $new_obj=new price_khachsan($array);
        if($insert)
        {
            price_khachsan_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/price_khachsan.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            price_khachsan_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/price_khachsan.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=price_khachsan_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=price_khachsan_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_price_khachsan($data);
}
else
{
     header('location: '.SITE_NAME);
}
