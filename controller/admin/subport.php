<?php
require_once '../../config.php';
require_once DIR.'/model/subportService.php';
require_once DIR.'/view/admin/subport.php';
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
            $new_obj= new subport();
            $new_obj->id=$_GET["id"];
            subport_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/subport.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=subport_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/subport.php');
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
            $List_subport=subport_getByAll();
            foreach($List_subport as $subport)
            {
                if(isset($_GET["check_".$subport->id])) subport_delete($subport);
            }
            header('Location: '.SITE_NAME.'/controller/admin/subport.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["phone"])&&isset($_POST["skype"])&&isset($_POST["email"])&&isset($_POST["yahoo"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['phone']))
       $array['phone']='0';
       if(!isset($array['skype']))
       $array['skype']='0';
       if(!isset($array['email']))
       $array['email']='0';
       if(!isset($array['yahoo']))
       $array['yahoo']='0';
      $new_obj=new subport($array);
        if($insert)
        {
            subport_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/subport.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            subport_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/subport.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=subport_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=subport_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_subport($data);
}
else
{
     header('location: '.SITE_NAME);
}
