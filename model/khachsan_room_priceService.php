<?php
require_once DIR.'/model/khachsan_room_price.php';
require_once DIR.'/model/sqlconnection.php';
//
function khachsan_room_price_Get($command)
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
                $new_obj=new khachsan_room_price($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'khachsan_room_price');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new khachsan_room_price($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function khachsan_room_price_getById($id)
{
    return khachsan_room_price_Get('select * from khachsan_room_price where id='.$id);
}
//
function khachsan_room_price_getByAll()
{
    return khachsan_room_price_Get('select * from khachsan_room_price');
}
//
function khachsan_room_price_getByTop($top,$where,$order)
{
    return khachsan_room_price_Get("select * from khachsan_room_price ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function khachsan_room_price_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return khachsan_room_price_Get("SELECT * FROM  khachsan_room_price ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function khachsan_room_price_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return khachsan_room_price_Get("SELECT khachsan_room_price.id, khachsan.name as danhmuc_id, khachsan_room_price.name, khachsan_room_price.img, khachsan_room_price.description, khachsan_room_price.dichvu, khachsan_room_price.price, khachsan_room_price.amount_people, khachsan_room_price.amount_room FROM  khachsan_room_price, khachsan where khachsan.id=khachsan_room_price.danhmuc_id  ".(($where!='')?(' and '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function khachsan_room_price_insert($obj)
{
    return exe_query("insert into khachsan_room_price (danhmuc_id,name,img,description,dichvu,price,amount_people,amount_room) values ('$obj->danhmuc_id','$obj->name','$obj->img','$obj->description','$obj->dichvu','$obj->price','$obj->amount_people','$obj->amount_room')",'khachsan_room_price');
}
//
function khachsan_room_price_update($obj)
{
    return exe_query("update khachsan_room_price set danhmuc_id='$obj->danhmuc_id',name='$obj->name',img='$obj->img',description='$obj->description',dichvu='$obj->dichvu',price='$obj->price',amount_people='$obj->amount_people',amount_room='$obj->amount_room' where id=$obj->id",'khachsan_room_price');
}
//
function khachsan_room_price_delete($obj)
{
    return exe_query('delete from khachsan_room_price where id='.$obj->id,'khachsan_room_price');
}
//
function khachsan_room_price_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from khachsan_room_price '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
function khachsan_room_price_update_hotel($obj)
{
    return exe_query("update khachsan_room_price set amount_people='$obj->amount_people',amount_room='$obj->amount_room' where id=$obj->id",'khachsan_room_price');
}
function khachsan_room_danhmuc_delete($obj)
{
    return exe_query('delete from khachsan_room_price where danhmuc_id='.$obj->danhmuc_id,'khachsan_room_price');
}