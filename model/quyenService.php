<?php
require_once DIR.'/model/quyen.php';
require_once DIR.'/model/sqlconnection.php';
//
function quyen_Get($command)
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
                $new_obj=new quyen($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'quyen');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new quyen($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function quyen_getById($id)
{
    return quyen_Get('select * from quyen where id='.$id);
}
//
function quyen_getByAll()
{
    return quyen_Get('select * from quyen');
}
//
function quyen_getByTop($top,$where,$order)
{
    return quyen_Get("select * from quyen ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function quyen_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return quyen_Get("SELECT * FROM  quyen ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function quyen_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return quyen_Get("SELECT quyen.id, quyen.name FROM  quyen ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function quyen_insert($obj)
{
    return exe_query("insert into quyen (name) values ('$obj->name')",'quyen');
}
//
function quyen_update($obj)
{
    return exe_query("update quyen set name='$obj->name' where id=$obj->id",'quyen');
}
//
function quyen_delete($obj)
{
    return exe_query('delete from quyen where id='.$obj->id,'quyen');
}
//
function quyen_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from quyen '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
