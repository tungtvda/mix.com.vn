<?php
require_once '../../config.php';
require_once DIR.'/model/contactService.php';
require_once DIR.'/view/admin/contact.php';
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
            $new_obj= new contact();
            $new_obj->id=$_GET["id"];
            contact_delete($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/contact.php');
        }
        else if($_GET["action"]=="edit")
        {
            $new_obj=contact_getById($_GET["id"]);
            if($new_obj!=false)
            {
                $data['form']=$new_obj[0];
                $data['tab2_class']='default-tab current';
                $data['tab1_class']=' ';
                $insert=false;
            }
            else header('Location: '.SITE_NAME.'/controller/admin/contact.php');
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
            $List_contact=contact_getByAll();
            foreach($List_contact as $contact)
            {
                if(isset($_GET["check_".$contact->id])) contact_delete($contact);
            }
            header('Location: '.SITE_NAME.'/controller/admin/contact.php');
        }
    }
    if(isset($_POST["name_kh"])&&isset($_POST["address"])&&isset($_POST["phone"])&&isset($_POST["email"])&&isset($_POST["title"])&&isset($_POST["content"])&&isset($_POST["created"]))
    {
       $array=$_POST;
       if(!isset($array['id']))
       $array['id']='0';
       if(!isset($array['name_kh']))
       $array['name_kh']='0';
       if(!isset($array['address']))
       $array['address']='0';
       if(!isset($array['phone']))
       $array['phone']='0';
       if(!isset($array['email']))
       $array['email']='0';
       if(!isset($array['title']))
       $array['title']='0';
       if(!isset($array['content']))
       $array['content']='0';
       if(!isset($array['created']))
       $array['created']='0';
       if(!isset($array['status']))
       $array['status']='0';
      $new_obj=new contact($array);
        if($insert)
        {
            contact_insert($new_obj);
            header('Location: '.SITE_NAME.'/controller/admin/contact.php');
        }
        else
        {
            $new_obj->id=$_GET["id"];
            contact_update($new_obj);
            $insert=false;
            header('Location: '.SITE_NAME.'/controller/admin/contact.php');
        }
    }
    $data['username']=isset($_SESSION["UserName"])?$_SESSION["UserName"]:'quản trị viên';
    $data['count_paging']=contact_count('');
    $data['page']=isset($_GET['page'])?$_GET['page']:'1';
    $data['table_body']=contact_getByPagingReplace($data['page'],20,'id DESC','');
    // gọi phương thức trong tầng view để hiển thị
    view_contact($data);
}
else
{
     header('location: '.SITE_NAME);
}
