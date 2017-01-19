<?php
require_once '../../config.php';
require_once DIR.'/model/dichvuService.php';
require_once DIR.'/model/danhmuc_dichvuService.php';
require_once DIR.'/view/admin/dichvu.php';
require_once DIR.'/common/messenger.php';
require_once DIR.'/common/locdautiengviet.php';
$data=array();
$insert=true;
if(isset($_SESSION["Admin"]))
{
    if(isset($_GET["action"])&&isset($_GET["id"]))
    {
        if($_GET["action"]=="delete")
        {
            $new_obj= new dichvu();
            $new_obj->id=$_GET["id"];
            dichvu_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/dichvu.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=dichvu_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/dichvu.php');
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
    $data['listfkey']['danhmuc_id']=danhmuc_dichvu_getByAll();
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_dichvu=dichvu_getByAll();
            foreach($List_dichvu as $dichvu)
            {
                if(isset($_GET["check_".$dichvu->id])) dichvu_delete($dichvu);
            }
            header('Location: '.SITE_NAME.'/controller/admin/dichvu.php');
        }
    }
    if(isset($_POST["danhmuc_id"])&&isset($_POST["name"])&&isset($_POST["name_url"])&&isset($_POST["img"])&&isset($_POST["content"])&&isset($_POST["title"])&&isset($_POST["keyword"])&&isset($_POST["description"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['danhmuc_id']))
       $array['danhmuc_id']='0';
       if(!isset($array['name']))
       $array['name']='0';
       if(!isset($array['name_url']))
       $array['name_url']='0';
        $array['name_url']=LocDau($array['name']);
       if(!isset($array['img']))
       $array['img']='0';
       if(!isset($array['content']))
       $array['content']='0';
       if(!isset($array['title']))
       $array['title']='0';
       if(!isset($array['keyword']))
       $array['keyword']='0';
       if(!isset($array['description']))
       $array['description']='0';
      $new_obj=new dichvu($array);
        if($insert)
        {
            dichvu_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/dichvu.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            dichvu_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/dichvu.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=dichvu_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=dichvu_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_dichvu($data);
}
else
{
     header('location: '.SITE_NAME);
}
