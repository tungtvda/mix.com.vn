<?php
require_once DIR.'/model/video.php';
require_once DIR.'/model/sqlconnection.php';
//
function video_Get($command)
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
                $new_obj=new video($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'video');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new video($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function video_getById($id)
{
    return video_Get('select * from video where id='.$id);
}
//
function video_getByAll()
{
    return video_Get('select * from video');
}
//
function video_getByTop($top,$where,$order)
{
    return video_Get("select * from video ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function video_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return video_Get("SELECT * FROM  video ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function video_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return video_Get("SELECT video.id, video.name, video.link_video, video.highlights FROM  video ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function video_insert($obj)
{
    return exe_query("insert into video (name,link_video,highlights) values ('$obj->name','$obj->link_video','$obj->highlights')",'video');
}
//
function video_update($obj)
{
    return exe_query("update video set name='$obj->name',link_video='$obj->link_video',highlights='$obj->highlights' where id=$obj->id",'video');
}
//
function video_delete($obj)
{
    return exe_query('delete from video where id='.$obj->id,'video');
}
//
function video_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from video '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
