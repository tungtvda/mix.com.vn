<?php
require_once DIR.'/model/khachsan_img.php';
require_once DIR.'/model/sqlconnection.php';
//
function khachsan_img_Get($command)
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
                $new_obj=new khachsan_img($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'khachsan_img');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new khachsan_img($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function khachsan_img_getById($id)
{
    return khachsan_img_Get('select * from khachsan_img where id='.$id);
}
//
function khachsan_img_getByAll()
{
    return khachsan_img_Get('select * from khachsan_img');
}
//
function khachsan_img_getByTop($top,$where,$order)
{
    return khachsan_img_Get("select * from khachsan_img ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function khachsan_img_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return khachsan_img_Get("SELECT * FROM  khachsan_img ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function khachsan_img_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return khachsan_img_Get("SELECT khachsan_img.id, khachsan.name as danhmuc_id, khachsan_img.name, khachsan_img.img, khachsan_img.position FROM  khachsan_img, khachsan where khachsan.id=khachsan_img.danhmuc_id  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function khachsan_img_insert($obj)
{
    return exe_query("insert into khachsan_img (danhmuc_id,name,img,position) values ('$obj->danhmuc_id','$obj->name','$obj->img','$obj->position')",'khachsan_img');
}
//
function khachsan_img_update($obj)
{
    return exe_query("update khachsan_img set danhmuc_id='$obj->danhmuc_id',name='$obj->name',img='$obj->img',position='$obj->position' where id=$obj->id",'khachsan_img');
}
//
function khachsan_img_delete($obj)
{
    return exe_query('delete from khachsan_img where id='.$obj->id,'khachsan_img');
}
//
function khachsan_img_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from khachsan_img '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
function khachsan_img_danhmuc_delete($obj)
{
    return exe_query('delete from khachsan_img where danhmuc_id='.$obj->danhmuc_id,'khachsan_img');
}