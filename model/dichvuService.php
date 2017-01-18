<?php
require_once DIR.'/model/dichvu.php';
require_once DIR.'/model/sqlconnection.php';
//
function dichvu_Get($command)
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
                $new_obj=new dichvu($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'dichvu');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new dichvu($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function dichvu_getById($id)
{
    return dichvu_Get('select * from dichvu where id='.$id);
}
//
function dichvu_getByAll()
{
    return dichvu_Get('select * from dichvu');
}
//
function dichvu_getByTop($top,$where,$order)
{
    return dichvu_Get("select * from dichvu ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function dichvu_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return dichvu_Get("SELECT * FROM  dichvu ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function dichvu_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return dichvu_Get("SELECT dichvu.id, danhmuc_dichvu.name as danhmuc_id, dichvu.name, dichvu.name_url, dichvu.img, dichvu.content, dichvu.title, dichvu.keyword, dichvu.description FROM  dichvu, danhmuc_dichvu where danhmuc_dichvu.id=dichvu.danhmuc_id  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function dichvu_insert($obj)
{
    return exe_query("insert into dichvu (danhmuc_id,name,name_url,img,content,title,keyword,description) values ('$obj->danhmuc_id','$obj->name','$obj->name_url','$obj->img','$obj->content','$obj->title','$obj->keyword','$obj->description')",'dichvu');
}
//
function dichvu_update($obj)
{
    return exe_query("update dichvu set danhmuc_id='$obj->danhmuc_id',name='$obj->name',name_url='$obj->name_url',img='$obj->img',content='$obj->content',title='$obj->title',keyword='$obj->keyword',description='$obj->description' where id=$obj->id",'dichvu');
}
//
function dichvu_delete($obj)
{
    return exe_query('delete from dichvu where id='.$obj->id,'dichvu');
}
//
function dichvu_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from dichvu '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
