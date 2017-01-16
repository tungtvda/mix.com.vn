<?php
require_once DIR.'/model/menu.php';
require_once DIR.'/model/sqlconnection.php';
//
function menu_Get($command)
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
                $new_obj=new menu($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'menu');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new menu($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function menu_getById($id)
{
    return menu_Get('select * from menu where id='.$id);
}
//
function menu_getByAll()
{
    return menu_Get('select * from menu');
}
//
function menu_getByTop($top,$where,$order)
{
    return menu_Get("select * from menu ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function menu_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return menu_Get("SELECT * FROM  menu ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function menu_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return menu_Get("SELECT menu.id, menu.img, menu.name, menu.title, menu.keyword, menu.description FROM  menu ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function menu_insert($obj)
{
    return exe_query("insert into menu (img,name,title,keyword,description) values ('$obj->img','$obj->name','$obj->title','$obj->keyword','$obj->description')",'menu');
}
//
function menu_update($obj)
{
    return exe_query("update menu set img='$obj->img',name='$obj->name',title='$obj->title',keyword='$obj->keyword',description='$obj->description' where id=$obj->id",'menu');
}
//
function menu_delete($obj)
{
    return exe_query('delete from menu where id='.$obj->id,'menu');
}
//
function menu_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from menu '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
