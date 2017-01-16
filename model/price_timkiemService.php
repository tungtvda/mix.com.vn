<?php
require_once DIR.'/model/price_timkiem.php';
require_once DIR.'/model/sqlconnection.php';
//
function price_timkiem_Get($command)
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
                $new_obj=new price_timkiem($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'price_timkiem');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new price_timkiem($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function price_timkiem_getById($id)
{
    return price_timkiem_Get('select * from price_timkiem where id='.$id);
}
//
function price_timkiem_getByAll()
{
    return price_timkiem_Get('select * from price_timkiem');
}
//
function price_timkiem_getByTop($top,$where,$order)
{
    return price_timkiem_Get("select * from price_timkiem ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function price_timkiem_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return price_timkiem_Get("SELECT * FROM  price_timkiem ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function price_timkiem_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return price_timkiem_Get("SELECT price_timkiem.id, price_timkiem.name, price_timkiem.value, price_timkiem.position FROM  price_timkiem ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function price_timkiem_insert($obj)
{
    return exe_query("insert into price_timkiem (name,value,position) values ('$obj->name','$obj->value','$obj->position')",'price_timkiem');
}
//
function price_timkiem_update($obj)
{
    return exe_query("update price_timkiem set name='$obj->name',value='$obj->value',position='$obj->position' where id=$obj->id",'price_timkiem');
}
//
function price_timkiem_delete($obj)
{
    return exe_query('delete from price_timkiem where id='.$obj->id,'price_timkiem');
}
//
function price_timkiem_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from price_timkiem '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
