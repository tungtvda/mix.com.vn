<?php
require_once DIR.'/model/price_khachsan.php';
require_once DIR.'/model/sqlconnection.php';
//
function price_khachsan_Get($command)
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
                $new_obj=new price_khachsan($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'price_khachsan');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new price_khachsan($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function price_khachsan_getById($id)
{
    return price_khachsan_Get('select * from price_khachsan where id='.$id);
}
//
function price_khachsan_getByAll()
{
    return price_khachsan_Get('select * from price_khachsan');
}
//
function price_khachsan_getByTop($top,$where,$order)
{
    return price_khachsan_Get("select * from price_khachsan ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function price_khachsan_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return price_khachsan_Get("SELECT * FROM  price_khachsan ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function price_khachsan_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return price_khachsan_Get("SELECT price_khachsan.id, price_khachsan.name, price_khachsan.value, price_khachsan.position FROM  price_khachsan ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function price_khachsan_insert($obj)
{
    return exe_query("insert into price_khachsan (name,value,position) values ('$obj->name','$obj->value','$obj->position')",'price_khachsan');
}
//
function price_khachsan_update($obj)
{
    return exe_query("update price_khachsan set name='$obj->name',value='$obj->value',position='$obj->position' where id=$obj->id",'price_khachsan');
}
//
function price_khachsan_delete($obj)
{
    return exe_query('delete from price_khachsan where id='.$obj->id,'price_khachsan');
}
//
function price_khachsan_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from price_khachsan '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
