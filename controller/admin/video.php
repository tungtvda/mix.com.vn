<?php
require_once '../../config.php';
require_once DIR.'/model/videoService.php';
require_once DIR.'/view/admin/video.php';
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
            $new_obj= new video();
            $new_obj->id=$_GET["id"];
            video_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/video.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=video_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/video.php');
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
            $List_video=video_getByAll();
            foreach($List_video as $video)
            {
                if(isset($_GET["check_".$video->id])) video_delete($video);
            }
            header('Location: '.SITE_NAME.'/controller/admin/video.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["link_video"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['link_video']))
       $array['link_video']='0';
       if(!isset($array['highlights']))
       $array['highlights']='0';
      $new_obj=new video($array);
        if($insert)
        {
            video_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/video.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            video_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/video.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=video_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=video_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_video($data);
}
else
{
     header('location: '.SITE_NAME);
}
