<?php
require_once DIR.'/model/news.php';
require_once DIR.'/model/sqlconnection.php';
//
function news_Get($command)
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
                $new_obj=new news($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'news');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new news($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function news_getById($id)
{
    return news_Get('select * from news where id='.$id);
}
//
function news_getByAll()
{
    return news_Get('select * from news');
}
//
function news_getByTop($top,$where,$order)
{
    return news_Get("select * from news ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function news_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return news_Get("SELECT * FROM  news ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function news_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return news_Get("SELECT news.id, danhmuc_tintuc.name as danhmuc_id, news.name, news.name_url, news.img, news.view, news.content, news.title, news.keyword, news.description, news.created FROM  news, danhmuc_tintuc where danhmuc_tintuc.id=news.danhmuc_id  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function news_insert($obj)
{
    return exe_query("insert into news (danhmuc_id,name,name_url,img,view,content,title,keyword,description,created) values ('$obj->danhmuc_id','$obj->name','$obj->name_url','$obj->img','$obj->view','$obj->content','$obj->title','$obj->keyword','$obj->description','$obj->created')",'news');
}
//
function news_update($obj)
{
    return exe_query("update news set danhmuc_id='$obj->danhmuc_id',name='$obj->name',name_url='$obj->name_url',img='$obj->img',view='$obj->view',content='$obj->content',title='$obj->title',keyword='$obj->keyword',description='$obj->description',created='$obj->created' where id=$obj->id",'news');
}
//
function news_delete($obj)
{
    return exe_query('delete from news where id='.$obj->id,'news');
}
//
function news_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from news '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
//
function news_update_view($obj)
{
    return exe_query("update news set view='$obj->view' where id=$obj->id",'news');
}
