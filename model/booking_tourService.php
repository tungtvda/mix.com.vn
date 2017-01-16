<?php
require_once DIR.'/model/booking_tour.php';
require_once DIR.'/model/sqlconnection.php';
//
function booking_tour_Get($command)
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
                $new_obj=new booking_tour($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'booking_tour');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new booking_tour($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function booking_tour_getById($id)
{
    return booking_tour_Get('select * from booking_tour where id='.$id);
}
//
function booking_tour_getByAll()
{
    return booking_tour_Get('select * from booking_tour');
}
//
function booking_tour_getByTop($top,$where,$order)
{
    return booking_tour_Get("select * from booking_tour ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function booking_tour_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return booking_tour_Get("SELECT * FROM  booking_tour ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function booking_tour_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return booking_tour_Get("SELECT booking_tour.id, booking_tour.tour_id, booking_tour.name_tour, booking_tour.name_customer, booking_tour.language, booking_tour.phone, booking_tour.email, booking_tour.address, booking_tour.departure_day, booking_tour.adults, booking_tour.children_5_10, booking_tour.children_5, booking_tour.price, booking_tour.price_children, booking_tour.price_children_under_5, booking_tour.total_price, booking_tour.request, booking_tour.status, booking_tour.created FROM  booking_tour ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function booking_tour_insert($obj)
{
    return exe_query("insert into booking_tour (tour_id,name_tour,name_customer,language,phone,email,address,departure_day,adults,children_5_10,children_5,price,price_children,price_children_under_5,total_price,request,status,created) values ('$obj->tour_id','$obj->name_tour','$obj->name_customer','$obj->language','$obj->phone','$obj->email','$obj->address','$obj->departure_day','$obj->adults','$obj->children_5_10','$obj->children_5','$obj->price','$obj->price_children','$obj->price_children_under_5','$obj->total_price','$obj->request','$obj->status','$obj->created')",'booking_tour');
}
//
function booking_tour_update($obj)
{
    return exe_query("update booking_tour set tour_id='$obj->tour_id',name_tour='$obj->name_tour',name_customer='$obj->name_customer',language='$obj->language',phone='$obj->phone',email='$obj->email',address='$obj->address',departure_day='$obj->departure_day',adults='$obj->adults',children_5_10='$obj->children_5_10',children_5='$obj->children_5',price='$obj->price',price_children='$obj->price_children',price_children_under_5='$obj->price_children_under_5',total_price='$obj->total_price',request='$obj->request',status='$obj->status',created='$obj->created' where id=$obj->id",'booking_tour');
}
//
function booking_tour_delete($obj)
{
    return exe_query('delete from booking_tour where id='.$obj->id,'booking_tour');
}
//
function booking_tour_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(id) as count from booking_tour '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
