<?php
require_once DIR.'/model/tuyendung.php';
require_once DIR.'/model/sqlconnection.php';
//
function tuyendung_Get($command)
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
                $new_obj=new tuyendung($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'tuyendung');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new tuyendung($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function tuyendung_getById($id)
{
    return tuyendung_Get('select * from tuyendung where id='.$id);
}
//
function tuyendung_getByAll()
{
    return tuyendung_Get('select * from tuyendung');
}
//
function tuyendung_getByTop($top,$where,$order)
{
    return tuyendung_Get("select * from tuyendung ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function tuyendung_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return tuyendung_Get("SELECT * FROM  tuyendung ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tuyendung_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return tuyendung_Get("SELECT tuyendung.id, tuyendung.name, tuyendung.name_url, tuyendung.img, tuyendung.content, tuyendung.title, tuyendung.keyword, tuyendung.description, tuyendung.created FROM  tuyendung ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function tuyendung_insert($obj)
{
    return exe_query("insert into tuyendung (name,name_url,img,content,title,keyword,description,created) values ('$obj->name','$obj->name_url','$obj->img','$obj->content','$obj->title','$obj->keyword','$obj->description','$obj->created')",'tuyendung');
}
//
function tuyendung_update($obj)
{
    return exe_query("update tuyendung set name='$obj->name',name_url='$obj->name_url',img='$obj->img',content='$obj->content',title='$obj->title',keyword='$obj->keyword',description='$obj->description',created='$obj->created' where id=$obj->id",'tuyendung');
}
//
function tuyendung_delete($obj)
{
    return exe_query('delete from tuyendung where id='.$obj->id,'tuyendung');
}
//
function tuyendung_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from tuyendung '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
