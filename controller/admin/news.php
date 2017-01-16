<?php
require_once '../../config.php';
require_once DIR.'/model/newsService.php';
require_once DIR.'/model/danhmuc_tintucService.php';
require_once DIR.'/view/admin/news.php';
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
            $new_obj= new news();
            $new_obj->id=$_GET["id"];
            news_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/news.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=news_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/news.php');
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
    $data['listfkey']['danhmuc_id']=danhmuc_tintuc_getByAll();
    if(isset($_GET["action_all"]))
    {
        if($_GET["action_all"]=="ThemMoi")
        {
            $data['tab2_class']='default-tab current';
            $data['tab1_class']=' ';
        }
        else
        {
            $List_news=news_getByAll();
            foreach($List_news as $news)
            {
                if(isset($_GET["check_".$news->id])) news_delete($news);
            }
            header('Location: '.SITE_NAME.'/controller/admin/news.php');
        }
    }
    if(isset($_POST["danhmuc_id"])&&isset($_POST["name"])&&isset($_POST["name_url"])&&isset($_POST["img"])&&isset($_POST["view"])&&isset($_POST["content"])&&isset($_POST["title"])&&isset($_POST["keyword"])&&isset($_POST["description"])&&isset($_POST["created"]))
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
       if(!isset($array['view']))
       $array['view']='0';
       if(!isset($array['content']))
       $array['content']='0';
       if(!isset($array['title']))
       $array['title']='0';
       if(!isset($array['keyword']))
       $array['keyword']='0';
       if(!isset($array['description']))
       $array['description']='0';
       if(!isset($array['created']))
       $array['created']='0';
      $new_obj=new news($array);
        if($insert)
        {
            news_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/news.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            news_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/news.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=news_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=news_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_news($data);
}
else
{
     header('location: '.SITE_NAME);
}
