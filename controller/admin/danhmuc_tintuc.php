<?php
require_once '../../config.php';
require_once DIR.'/model/danhmuc_tintucService.php';
require_once DIR.'/view/admin/danhmuc_tintuc.php';
require_once DIR.'/common/messenger.php';
require_once DIR.'/common/locdautiengviet.php';
$data=array();
$insert=true;
returnCountData();
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new danhmuc_tintuc();
            $new_obj->id=$_GET["id"];
            danhmuc_tintuc_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_tintuc.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=danhmuc_tintuc_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/danhmuc_tintuc.php');
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
            $List_danhmuc_tintuc=danhmuc_tintuc_getByAll();
            foreach($List_danhmuc_tintuc as $danhmuc_tintuc)
            {
                if(isset($_GET["check_".$danhmuc_tintuc->id])) danhmuc_tintuc_delete($danhmuc_tintuc);
            }
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_tintuc.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["name_url"])&&isset($_POST["img"])&&isset($_POST["position"])&&isset($_POST["title"])&&isset($_POST["keyword"])&&isset($_POST["description"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['name_url']))
       $array['name_url']='0';
        $array['name_url']=LocDau($array['name']);
       if(!isset($array['img']))
       $array['img']='0';
       if(!isset($array['position']))
       $array['position']='0';
       if(!isset($array['title']))
       $array['title']='0';
       if(!isset($array['keyword']))
       $array['keyword']='0';
       if(!isset($array['description']))
       $array['description']='0';
      $new_obj=new danhmuc_tintuc($array);
        if($insert)
        {
            danhmuc_tintuc_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_tintuc.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            danhmuc_tintuc_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/danhmuc_tintuc.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=danhmuc_tintuc_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=danhmuc_tintuc_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_danhmuc_tintuc($data);
}
else
{
     header('location: '.SITE_NAME);
}
