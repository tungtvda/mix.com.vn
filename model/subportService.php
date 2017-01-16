<?php
require_once DIR.'/model/subport.php';
require_once DIR.'/model/sqlconnection.php';
//
function subport_Get($command)
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
                $new_obj=new subport($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'subport');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new subport($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function subport_getById($id)
{
    return subport_Get('select * from subport where id='.$id);
}
//
function subport_getByAll()
{
    return subport_Get('select * from subport');
}
//
function subport_getByTop($top,$where,$order)
{
    return subport_Get("select * from subport ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function subport_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return subport_Get("SELECT * FROM  subport ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function subport_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return subport_Get("SELECT subport.id, subport.name, subport.phone, subport.skype, subport.email, subport.yahoo FROM  subport ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function subport_insert($obj)
{
    return exe_query("insert into subport (name,phone,skype,email,yahoo) values ('$obj->name','$obj->phone','$obj->skype','$obj->email','$obj->yahoo')",'subport');
}
//
function subport_update($obj)
{
    return exe_query("update subport set name='$obj->name',phone='$obj->phone',skype='$obj->skype',email='$obj->email',yahoo='$obj->yahoo' where id=$obj->id",'subport');
}
//
function subport_delete($obj)
{
    return exe_query('delete from subport where id='.$obj->id,'subport');
}
//
function subport_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from subport '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
