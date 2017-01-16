<?php
require_once DIR.'/model/tag.php';
require_once DIR.'/model/sqlconnection.php';
//
function tag_Get($command)
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
                $new_obj=new tag($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'tag');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new tag($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function tag_getById($id)
{
    return tag_Get('select * from tag where id='.$id);
}
//
function tag_getByAll()
{
    return tag_Get('select * from tag');
}
//
function tag_getByTop($top,$where,$order)
{
    return tag_Get("select * from tag ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function tag_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return tag_Get("SELECT * FROM  tag ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tag_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return tag_Get("SELECT tag.id, tag.name, tag.link, tag.position FROM  tag ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tag_insert($obj)
{
    return exe_query("insert into tag (name,link,position) values ('$obj->name','$obj->link','$obj->position')",'tag');
}
//
function tag_update($obj)
{
    return exe_query("update tag set name='$obj->name',link='$obj->link',position='$obj->position' where id=$obj->id",'tag');
}
//
function tag_delete($obj)
{
    return exe_query('delete from tag where id='.$obj->id,'tag');
}
//
function tag_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from tag '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
