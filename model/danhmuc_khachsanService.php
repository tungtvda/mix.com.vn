<?php
require_once DIR.'/model/danhmuc_khachsan.php';
require_once DIR.'/model/sqlconnection.php';
//
function danhmuc_khachsan_Get($command)
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
                $new_obj=new danhmuc_khachsan($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'danhmuc_khachsan');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new danhmuc_khachsan($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function danhmuc_khachsan_getById($id)
{
    return danhmuc_khachsan_Get('select * from danhmuc_khachsan where id='.$id);
}
//
function danhmuc_khachsan_getByAll()
{
    return danhmuc_khachsan_Get('select * from danhmuc_khachsan');
}
//
function danhmuc_khachsan_getByTop($top,$where,$order)
{
    return danhmuc_khachsan_Get("select * from danhmuc_khachsan ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function danhmuc_khachsan_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_khachsan_Get("SELECT * FROM  danhmuc_khachsan ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_khachsan_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_khachsan_Get("SELECT danhmuc_khachsan.id, danhmuc_khachsan.name, danhmuc_khachsan.name_url, danhmuc_khachsan.img, danhmuc_khachsan.position, danhmuc_khachsan.title, danhmuc_khachsan.keyword, danhmuc_khachsan.description FROM  danhmuc_khachsan ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_khachsan_insert($obj)
{
    return exe_query("insert into danhmuc_khachsan (name,name_url,img,position,title,keyword,description) values ('$obj->name','$obj->name_url','$obj->img','$obj->position','$obj->title','$obj->keyword','$obj->description')",'danhmuc_khachsan');
}
//
function danhmuc_khachsan_update($obj)
{
    return exe_query("update danhmuc_khachsan set name='$obj->name',name_url='$obj->name_url',img='$obj->img',position='$obj->position',title='$obj->title',keyword='$obj->keyword',description='$obj->description' where id=$obj->id",'danhmuc_khachsan');
}
//
function danhmuc_khachsan_delete($obj)
{
    return exe_query('delete from danhmuc_khachsan where id='.$obj->id,'danhmuc_khachsan');
}
//
function danhmuc_khachsan_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from danhmuc_khachsan '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
