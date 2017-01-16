<?php
require_once DIR.'/model/contact.php';
require_once DIR.'/model/sqlconnection.php';
//
function contact_Get($command)
{
            $array_result=array();
    $key=md5($command);
    if(CACHE)
    {
        $mycache=ConnectCache();
        $cachecommand=$mycache->get($key);
        if($cachecommand)
        {
            $array_result=$cachecommand;
        }
        else
        {
          $result=mysqli_query(ConnectSql(),$command);
            if($result!=false)while($row=mysqli_fetch_array($result))
            {
                $new_obj=new contact($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'contact');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new contact($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function contact_getById($id)
{
    return contact_Get('select * from contact where id='.$id);
}
//
function contact_getByAll()
{
    return contact_Get('select * from contact');
}
//
function contact_getByTop($top,$where,$order)
{
    return contact_Get("select * from contact ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function contact_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return contact_Get("SELECT * FROM  contact ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function contact_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return contact_Get("SELECT contact.id, contact.name_kh, contact.address, contact.phone, contact.email, contact.title, contact.content, contact.created, contact.status FROM  contact ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function contact_insert($obj)
{
    return exe_query("insert into contact (name_kh,address,phone,email,title,content,created,status) values ('$obj->name_kh','$obj->address','$obj->phone','$obj->email','$obj->title','$obj->content','$obj->created','$obj->status')",'contact');
}
//
function contact_update($obj)
{
    return exe_query("update contact set name_kh='$obj->name_kh',address='$obj->address',phone='$obj->phone',email='$obj->email',title='$obj->title',content='$obj->content',created='$obj->created',status='$obj->status' where id=$obj->id",'contact');
}
//
function contact_delete($obj)
{
    return exe_query('delete from contact where id='.$obj->id,'contact');
}
//
function contact_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from contact '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
