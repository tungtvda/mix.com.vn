<?php
require_once DIR.'/model/khachsan.php';
require_once DIR.'/model/sqlconnection.php';
//
function khachsan_Get($command)
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
                $new_obj=new khachsan($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'khachsan');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new khachsan($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function khachsan_getById($id)
{
    return khachsan_Get('select * from khachsan where id='.$id);
}
//
function khachsan_getByAll()
{
    return khachsan_Get('select * from khachsan');
}
//
function khachsan_getByTop($top,$where,$order)
{
    return khachsan_Get("select * from khachsan ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function khachsan_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return khachsan_Get("SELECT * FROM  khachsan ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function khachsan_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return khachsan_Get("SELECT khachsan.id, danhmuc_khachsan.name as danhmuc_id, khachsan.highlights, khachsan.name, khachsan.name_url, khachsan.start, khachsan.price, khachsan.dichvu, khachsan.img, khachsan.address, khachsan.phone, khachsan.email, khachsan.map, khachsan.content, khachsan.title, khachsan.keyword, khachsan.description FROM  khachsan, danhmuc_khachsan where danhmuc_khachsan.id=khachsan.danhmuc_id  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function khachsan_insert($obj)
{
    return exe_query("insert into khachsan (danhmuc_id,highlights,name,name_url,start,price,dichvu,img,address,phone, email,map,content,title,keyword,description) values ('$obj->danhmuc_id','$obj->highlights','$obj->name','$obj->name_url','$obj->start','$obj->price','$obj->dichvu','$obj->img','$obj->address','$obj->phone','$obj->email','$obj->map','$obj->content','$obj->title','$obj->keyword','$obj->description')",'khachsan');
}
//
function khachsan_update($obj)
{
    return exe_query("update khachsan set danhmuc_id='$obj->danhmuc_id',highlights='$obj->highlights',name='$obj->name',name_url='$obj->name_url',start='$obj->start',price='$obj->price',dichvu='$obj->dichvu',img='$obj->img',address='$obj->address',phone='$obj->phone',email='$obj->email',map='$obj->map',content='$obj->content',title='$obj->title',keyword='$obj->keyword',description='$obj->description' where id=$obj->id",'khachsan');
}
//
function khachsan_delete($obj)
{
    return exe_query('delete from khachsan where id='.$obj->id,'khachsan');
}
//
function khachsan_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from khachsan '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
