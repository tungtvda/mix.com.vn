<?php
require_once DIR.'/model/social.php';
require_once DIR.'/model/sqlconnection.php';
//
function social_Get($command)
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
                $new_obj=new social($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'social');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new social($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function social_getById($id)
{
    return social_Get('select * from social where id='.$id);
}
//
function social_getByAll()
{
    return social_Get('select * from social');
}
//
function social_getByTop($top,$where,$order)
{
    return social_Get("select * from social ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function social_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return social_Get("SELECT * FROM  social ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function social_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return social_Get("SELECT social.id, social.facebook, social.twitter, social.youtube, social.google, social.rss FROM  social ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function social_insert($obj)
{
    return exe_query("insert into social (facebook,twitter,youtube,google,rss) values ('$obj->facebook','$obj->twitter','$obj->youtube','$obj->google','$obj->rss')",'social');
}
//
function social_update($obj)
{
    return exe_query("update social set facebook='$obj->facebook',twitter='$obj->twitter',youtube='$obj->youtube',google='$obj->google',rss='$obj->rss' where id=$obj->id",'social');
}
//
function social_delete($obj)
{
    return exe_query('delete from social where id='.$obj->id,'social');
}
//
function social_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from social '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
