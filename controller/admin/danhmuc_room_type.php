<?php
require_once '../../config.php';
require_once DIR.'/model/danhmuc_room_typeService.php';
require_once DIR.'/view/admin/danhmuc_room_type.php';
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
            $new_obj= new danhmuc_room_type();
            $new_obj->id=$_GET["id"];
            danhmuc_room_type_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_room_type.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=danhmuc_room_type_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/danhmuc_room_type.php');
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
            $List_danhmuc_room_type=danhmuc_room_type_getByAll();
            foreach($List_danhmuc_room_type as $danhmuc_room_type)
            {
                if(isset($_GET["check_".$danhmuc_room_type->id])) danhmuc_room_type_delete($danhmuc_room_type);
            }
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_room_type.php');
        }
    }
    if(isset($_POST["name"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
      $new_obj=new danhmuc_room_type($array);
        if($insert)
        {
            danhmuc_room_type_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_room_type.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            danhmuc_room_type_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_room_type.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=danhmuc_room_type_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=danhmuc_room_type_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_danhmuc_room_type($data);
}
else
{
     header('location: '.SITE_NAME);
}
