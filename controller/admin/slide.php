<?php
require_once '../../config.php';
require_once DIR.'/model/slideService.php';
require_once DIR.'/view/admin/slide.php';
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
            $new_obj= new slide();
            $new_obj->id=$_GET["id"];
            slide_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/slide.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=slide_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/slide.php');
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
            $List_slide=slide_getByAll();
            foreach($List_slide as $slide)
            {
                if(isset($_GET["check_".$slide->id])) slide_delete($slide);
            }
            header('Location: '.SITE_NAME.'/controller/admin/slide.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["contents_short"])&&isset($_POST["img"])&&isset($_POST["img_small"])&&isset($_POST["link"])&&isset($_POST["position"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['contents_short']))
       $array['contents_short']='0';
       if(!isset($array['img']))
       $array['img']='0';
       if(!isset($array['img_small']))
       $array['img_small']='0';
       if(!isset($array['link']))
       $array['link']='0';
       if(!isset($array['position']))
       $array['position']='0';
      $new_obj=new slide($array);
        if($insert)
        {
            slide_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/slide.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            slide_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/slide.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=slide_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=slide_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_slide($data);
}
else
{
     header('location: '.SITE_NAME);
}
