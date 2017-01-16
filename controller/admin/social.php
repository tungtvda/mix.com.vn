<?php
require_once '../../config.php';
require_once DIR.'/model/socialService.php';
require_once DIR.'/view/admin/social.php';
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
            $new_obj= new social();
            $new_obj->id=$_GET["id"];
            social_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/social.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=social_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/social.php');
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
            $List_social=social_getByAll();
            foreach($List_social as $social)
            {
                if(isset($_GET["check_".$social->id])) social_delete($social);
            }
            header('Location: '.SITE_NAME.'/controller/admin/social.php');
        }
    }
    if(isset($_POST["facebook"])&&isset($_POST["twitter"])&&isset($_POST["youtube"])&&isset($_POST["google"])&&isset($_POST["rss"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['facebook']))
       $array['facebook']='0';
       if(!isset($array['twitter']))
       $array['twitter']='0';
       if(!isset($array['youtube']))
       $array['youtube']='0';
       if(!isset($array['google']))
       $array['google']='0';
       if(!isset($array['rss']))
       $array['rss']='0';
      $new_obj=new social($array);
        if($insert)
        {
            social_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/social.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            social_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/social.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=social_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=social_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_social($data);
}
else
{
     header('location: '.SITE_NAME);
}
