<?php
require_once DIR.'/model/booking_hotel.php';
require_once DIR.'/model/sqlconnection.php';
//
function booking_hotel_Get($command)
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
                $new_obj=new booking_hotel($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'booking_hotel');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new booking_hotel($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function booking_hotel_getById($id)
{
    return booking_hotel_Get('select * from booking_hotel where id='.$id);
}
//
function booking_hotel_getByAll()
{
    return booking_hotel_Get('select * from booking_hotel');
}
//
function booking_hotel_getByTop($top,$where,$order)
{
    return booking_hotel_Get("select * from booking_hotel ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function booking_hotel_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return booking_hotel_Get("SELECT * FROM  booking_hotel ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function booking_hotel_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return booking_hotel_Get("SELECT booking_hotel.id, booking_hotel.hotel_id, booking_hotel.name_hotel, booking_hotel.name_customer, booking_hotel.phone, booking_hotel.email, booking_hotel.address, booking_hotel.from_date, booking_hotel.to_date, booking_hotel.num_member, booking_hotel.price, booking_hotel.price_room, booking_hotel.total_price, booking_hotel.request, booking_hotel.status, booking_hotel.created FROM  booking_hotel ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function booking_hotel_insert($obj)
{
    return exe_query("insert into booking_hotel (hotel_id,name_hotel,name_customer,phone,email,address,from_date, to_date,num_member,price,price_room,total_price,request,status,created) values ('$obj->hotel_id','$obj->name_hotel','$obj->name_customer','$obj->phone','$obj->email','$obj->address','$obj->from_date','$obj->to_date','$obj->num_member','$obj->price','$obj->price_room','$obj->total_price','$obj->request','$obj->status','$obj->created')",'booking_hotel');
}
//
function booking_hotel_update($obj)
{
    return exe_query("update booking_hotel set hotel_id='$obj->hotel_id',name_hotel='$obj->name_hotel',name_customer='$obj->name_customer',phone='$obj->phone',email='$obj->email',address='$obj->address',from_date='$obj->from_date',to_date='$obj->to_date',num_member='$obj->num_member',price='$obj->price',price_room='$obj->price_room',total_price='$obj->total_price',request='$obj->request',status='$obj->status',created='$obj->created' where id=$obj->id",'booking_hotel');
}
//
function booking_hotel_delete($obj)
{
    return exe_query('delete from booking_hotel where id='.$obj->id,'booking_hotel');
}
//
function booking_hotel_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from booking_hotel '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
function booking_hotel_update_status($id)
{
    return exe_query("update booking_hotel set status=1 where id=$id",'booking_hotel');
}