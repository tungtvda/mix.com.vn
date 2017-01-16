<?php
require_once '../../config.php';
require_once DIR.'/model/tagService.php';
require_once DIR.'/view/admin/tag.php';
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
            $new_obj= new tag();
            $new_obj->id=$_GET["id"];
            tag_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/tag.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=tag_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/tag.php');
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
            $List_tag=tag_getByAll();
            foreach($List_tag as $tag)
            {
                if(isset($_GET["check_".$tag->id])) tag_delete($tag);
            }
            header('Location: '.SITE_NAME.'/controller/admin/tag.php');
        }
    }
    if(isset($_POST["name"])&&isset($_POST["link"])&&isset($_POST["position"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['link']))
       $array['link']='0';
       if(!isset($array['position']))
       $array['position']='0';
      $new_obj=new tag($array);
        if($insert)
        {
            tag_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/tag.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            tag_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/tag.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=tag_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=tag_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_tag($data);
}
else
{
     header('location: '.SITE_NAME);
}
