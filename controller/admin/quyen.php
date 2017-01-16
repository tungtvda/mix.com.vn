<?php
require_once '../../config.php';
require_once DIR.'/model/quyenService.php';
require_once DIR.'/view/admin/quyen.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new quyen();
            $new_obj->id=$_GET["id"];
            quyen_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/quyen.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=quyen_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/quyen.php');
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
            $List_quyen=quyen_getByAll();
            foreach($List_quyen as $quyen)
            {
                if(isset($_GET["check_".$quyen->id])) quyen_delete($quyen);
            }
            header('Location: '.SITE_NAME.'/controller/admin/quyen.php');
        }
    }
    if(isset($_POST["name"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
      $new_obj=new quyen($array);
        if($insert)
        {
            quyen_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/quyen.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            quyen_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/quyen.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=quyen_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=quyen_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_quyen($data);
}
else
{
     header('location: '.SITE_NAME);
}
