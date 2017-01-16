<?php
require_once DIR.'/model/tieuchi.php';
require_once DIR.'/model/sqlconnection.php';
//
function tieuchi_Get($command)
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
                $new_obj=new tieuchi($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'tieuchi');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new tieuchi($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function tieuchi_getById($id)
{
    return tieuchi_Get('select * from tieuchi where id='.$id);
}
//
function tieuchi_getByAll()
{
    return tieuchi_Get('select * from tieuchi');
}
//
function tieuchi_getByTop($top,$where,$order)
{
    return tieuchi_Get("select * from tieuchi ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function tieuchi_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return tieuchi_Get("SELECT * FROM  tieuchi ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tieuchi_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return tieuchi_Get("SELECT tieuchi.id, tieuchi.name, tieuchi.img, tieuchi.position FROM  tieuchi ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tieuchi_insert($obj)
{
    return exe_query("insert into tieuchi (name,img,position) values ('$obj->name','$obj->img','$obj->position')",'tieuchi');
}
//
function tieuchi_update($obj)
{
    return exe_query("update tieuchi set name='$obj->name',img='$obj->img',position='$obj->position' where id=$obj->id",'tieuchi');
}
//
function tieuchi_delete($obj)
{
    return exe_query('delete from tieuchi where id='.$obj->id,'tieuchi');
}
//
function tieuchi_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from tieuchi '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
