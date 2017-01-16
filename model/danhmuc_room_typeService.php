<?php
require_once DIR.'/model/danhmuc_room_type.php';
require_once DIR.'/model/sqlconnection.php';
//
function danhmuc_room_type_Get($command)
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
                $new_obj=new danhmuc_room_type($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'danhmuc_room_type');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new danhmuc_room_type($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function danhmuc_room_type_getById($id)
{
    return danhmuc_room_type_Get('select * from danhmuc_room_type where id='.$id);
}
//
function danhmuc_room_type_getByAll()
{
    return danhmuc_room_type_Get('select * from danhmuc_room_type');
}
//
function danhmuc_room_type_getByTop($top,$where,$order)
{
    return danhmuc_room_type_Get("select * from danhmuc_room_type ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function danhmuc_room_type_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_room_type_Get("SELECT * FROM  danhmuc_room_type ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_room_type_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return danhmuc_room_type_Get("SELECT danhmuc_room_type.id, danhmuc_room_type.name FROM  danhmuc_room_type ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function danhmuc_room_type_insert($obj)
{
    return exe_query("insert into danhmuc_room_type (name) values ('$obj->name')",'danhmuc_room_type');
}
//
function danhmuc_room_type_update($obj)
{
    return exe_query("update danhmuc_room_type set name='$obj->name' where id=$obj->id",'danhmuc_room_type');
}
//
function danhmuc_room_type_delete($obj)
{
    return exe_query('delete from danhmuc_room_type where id='.$obj->id,'danhmuc_room_type');
}
//
function danhmuc_room_type_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from danhmuc_room_type '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
