<?php
require_once '../../config.php';
require_once DIR.'/model/configService.php';
require_once DIR.'/view/admin/config.php';
require_once DIR.'/common/messenger.php';
$data=array();
$insert=true;
returnCountData();
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["Id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new config();
            $new_obj->Id=$_GET["Id"];
            config_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/config.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=config_getById($_GET["Id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/config.php');
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
            $List_config=config_getByAll();
            foreach($List_config as $config)
            {
                if(isset($_GET["check_".$config->Id])) config_delete($config);
            }
            header('Location: '.SITE_NAME.'/controller/admin/config.php');
        }
    }
    if(isset($_POST["Logo"])&&isset($_POST["Icon"])&&isset($_POST["Name"])&&isset($_POST["Address"])&&isset($_POST["Phone"])&&isset($_POST["fax"])&&isset($_POST["Hotline"])&&isset($_POST["Email"])&&isset($_POST["Website"])&&isset($_POST["Map"])&&isset($_POST["Address_hcm"])&&isset($_POST["Phone_hcm"])&&isset($_POST["fax_hcm"])&&isset($_POST["Hotline_hcm"])&&isset($_POST["Email_hcm"])&&isset($_POST["Map_hcm"]))
    {
       $array=$_POST;
       if(!isset($array['Id']))
       $array['Id']='0';
       if(!isset($array['Logo']))
       $array['Logo']='0';
       if(!isset($array['Icon']))
       $array['Icon']='0';
       if(!isset($array['Name']))
       $array['Name']='0';
       if(!isset($array['Address']))
       $array['Address']='0';
       if(!isset($array['Phone']))
       $array['Phone']='0';
       if(!isset($array['fax']))
       $array['fax']='0';
       if(!isset($array['Hotline']))
       $array['Hotline']='0';
       if(!isset($array['Email']))
       $array['Email']='0';
       if(!isset($array['Website']))
       $array['Website']='0';
       if(!isset($array['Map']))
       $array['Map']='0';
       if(!isset($array['Address_hcm']))
       $array['Address_hcm']='0';
       if(!isset($array['Phone_hcm']))
       $array['Phone_hcm']='0';
       if(!isset($array['fax_hcm']))
       $array['fax_hcm']='0';
       if(!isset($array['Hotline_hcm']))
       $array['Hotline_hcm']='0';
       if(!isset($array['Email_hcm']))
       $array['Email_hcm']='0';
       if(!isset($array['Map_hcm']))
       $array['Map_hcm']='0';
      $new_obj=new config($array);
        if($insert)
        {
            config_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/config.php');
        }
        else
        {
            $new_obj->Id=$_GET["Id"];
            config_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/config.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=config_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=config_getByPagingReplace($data['page'],20,'Id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_config($data);
}
else
{
     header('location: '.SITE_NAME);
}
