<?php

/**
 * @author vdbkpro
 * @copyright 2013
 */
define("SITE_NAME", "http://localhost/mix.com.vn");
define("DIR", dirname(__FILE__));
define('SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','mix.com.vn');
define('CACHE',false);
define('DATETIME_FORMAT',"y-m-d H:i:s");
define('PRIVATE_KEY','hoidinhnvbk');
session_start();
require_once DIR.'/common/minifi.output.php';
ob_start("minify_output");
require_once DIR.'/model/contactService.php';
require_once DIR.'/model/booking_hotelService.php';
require_once DIR.'/model/booking_tourService.php';
require_once DIR.'/model/khachsan_room_priceService.php';
function returnSearchDurations(){
    $data['data']=tour_getByTop('','','durations asc');
    $data_arr=array();
    foreach($data['data'] as $row)
    {
        $name=$row->durations;
        if(!in_array($name,$data_arr)){
            array_push($data_arr,$name);
        }
    }
    $string='';
    if(count($data_arr)>0){
        foreach($data_arr as $val){
            if($val!='')
            {
                $string .="<option value=\"".$val."\">".$val."</option>";
            }
        }
    }
    return $string;
}
function returnPriceKhachSan(){
    $data['data']=price_khachsan_getByTop('','','position asc');
    $string='';
    foreach($data['data'] as $row)
    {
        $string .="<option value=\"".$row->value."\">".$row->name."</option>";
    }
    return $string;
}
function returnPriceTour(){
    $data['data']=price_timkiem_getByTop('','','position asc');
    $string='';
    foreach($data['data'] as $row)
    {
        $string .="<option value=\"".$row->value."\">".$row->name."</option>";
    }
    return $string;
}

function _returnDateFormatConvert($date)
{
    if ($date == '') {
        $DatesRemainder = '';
    } else {
        $DatesRemainder = date("d-m-Y H:i:s", strtotime($date));
    }
    return $DatesRemainder;
}
function bookingHotel($data){
    if(isset($_POST['from_date'])&&isset($_POST['to_date'])&&isset($_POST['id_input'])&&isset($_POST['price_room'])&&isset($_POST['num_member'])&&isset($_POST['name_booking'])&&isset($_POST['email_booking'])&&isset($_POST['phone_booking'])&&isset($_POST['address_booking'])&&isset($_POST['request_booking'])){
        $contact = "Liên hệ";
        $id = $data->id;
        $name_url = $data->name_url;
        $from_date_old=$from_date = str_replace('/','-',checkPostParamSecurity('from_date'));
        $to_date_old=$to_date =  str_replace('/','-',checkPostParamSecurity('to_date'));
        $price =$data->price;
        $num_member = checkPostParamSecurity('num_member');
        $full_name = checkPostParamSecurity('name_booking');
        $email = checkPostParamSecurity('email_booking');
        $phone = checkPostParamSecurity('phone_booking');
        $address = checkPostParamSecurity('address_booking');
        $request = checkPostParamSecurity('request_booking');
        $price_room=$_POST['price_room'];
        if($from_date==''||$to_date==""){
            echo "<script>alert('Bạn vui lòng chọn ngày đến và ngày đi')</script>";
            exit;
        }
        $from_date = date('Y-m-d', strtotime($from_date));
        $to_date = date('Y-m-d', strtotime($to_date));
         $date_now = date('Y-m-d', strtotime(date(DATETIME_FORMAT)));

        if($from_date<$date_now||$to_date<$from_date){
            if($from_date<$date_now){
                echo "<script>alert('Bạn không thể chọn ngày trong quá khứ')</script>";
            }
            else{
                if($to_date<$from_date){
                    echo "<script>alert('Ngày đến không được nhỏ hơn ngày đi')</script>";
                }
            }

        }
        $first_date = strtotime($from_date);
        $second_date = strtotime($to_date);
        $datediff = abs($second_date - $first_date);
        $tongngay= floor($datediff / (60*60*24));
        if($tongngay==0)
        {
            $tongngay=1;
        }
        if($num_member>0&&$full_name!=''&&$email!=''&&$phone!=''&&$address!=''&&count($price_room)>0){

            $new = new booking_hotel();

            $new->hotel_id = $id;
            $new->name_hotel =  $data->name;
            $new->name_customer = $full_name;
            $new->phone = $phone;
            $new->email = $email;
            $new->address = $address;
            $new->from_date = $from_date;
            $new->to_date = $to_date;
            $new->num_member = $num_member;
            $new->price = $price;
            $new->request = $request;
            $new->status = 0;
            $new->created = date(DATETIME_FORMAT);
            $total=0;
            $price_room_string='';
            $price_room_string_table='';
            $count_check=1;
            foreach($price_room as $row){
                $data_price_room=khachsan_room_price_getById($row);
                if(count($data_price_room)>0){
                    if(isset($_POST['amount_people_'.$row])&&$_POST['amount_people_'.$row]>0){
                        $amount_people=checkPostParamSecurity('amount_people_'.$row);
                    }
                    else{
                        $amount_people=1;
                    }
                    if($count_check==1){
                        $price_room_string.=$row.'-'.$amount_people;
                    }
                    else{
                        $price_room_string.='/'.$row.'-'.$amount_people;
                    }
                    $price_format='Liên hệ';
                    if($data_price_room[0]->price>0){
                        $price_format=number_format((int)$data_price_room[0]->price,0,",",".") . 'vnđ';
                    }

                    $price_room_string_table.="<tr>
                                            <th>".$data_price_room[0]->name."</th>
                                             <th>$price_format</th>
                                            <th>$amount_people</th>
                                             <th>$tongngay</th>
                                        </tr>";

                    if($data_price_room[0]->price>0){
                        $sub_total=($data_price_room[0]->price*$amount_people)*$tongngay;
                        $total+=$sub_total;
                    }
                    else{
                        $check_contact=1;
                        break;
                    }
                    $count_check++;
                }

            }
            if(isset($check_contact)){
                $total_format=$total='Liên hệ';

            }
            else{
                $total_format=number_format((int)$total,0,",",".") . 'vnđ';
            }
            $new->total_price = $total;
            $new->price_room = $price_room_string;
            booking_hotel_insert($new);

            $mes = 'Đặt phòng thành công, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất, xin cảm ơn!';

            $message = "";
            $subject = "Azbooking.vn – Thông báo đặt phòng từ khách hàng";
            $message .= '<div style="float: left; width: 100%">
                            <style>
                                th, td, .table>tbody>tr>td {
                                    border: 1px solid #d4d4d4;
                                    padding: 12px 10px;
                                    background: rgba(238, 238, 238, 0.25);
                                }
                            </style>
                            <p>Tên khách hàng: <span style="color: #132fff; font-weight: bold">' . $full_name . '</span>,</p>
                            <p>Email: <span style="color: #132fff; font-weight: bold">' . $email . '</span>,</p>
                            <p>Điện thoại: <span style="color: #132fff; font-weight: bold">' . $phone . '</span>,</p>
                            <p>Địa chỉ: <span style="color: #132fff; font-weight: bold">' . $address . '</span>,</p>
                            <p>Ngày check-in: <span style="color: #132fff; font-weight: bold">' . $from_date_old . '</span>,</p>
                            <p>Ngày check-out: <span style="color: #132fff; font-weight: bold">' . $to_date_old . '</span>,</p>
                            <p>Ngày đặt: <span style="color: #132fff; font-weight: bold">' . _returnGetDateTime() . '</span>,</p>
                            <p>Khách sạn: <span style="color: #132fff; font-weight: bold">' . $data->name . '</span>,</p>
                             <p>Giá: <span style="color: #132fff; font-weight: bold">' . $data->price . '</span>,</p>
                             <p>Số người: <span style="color: #132fff; font-weight: bold">' . $num_member . '</span>,</p>

                             <p>Thông tin chi tiết</p>
                              <p><table>
                                        <tr>
                                            <th>Loại phòng</th>
                                             <th>Đơn giá</th>
                                            <th>Số lượng phòng</th>
                                            <th>Số ngày đặt</th>
                                        </tr>
                                      '.$price_room_string_table.'
                                    </table></p>
                            <p>Tổng tiền: '.$total_format.'</p>
                           <p>' . $request . '</p>
                        </div>';
            SendMail('tungtv.soict@gmail.com', $message, $subject);
            SendMail($email, $message, 'Azbooking.vn – Xác nhận đặt phòng');
            if($data->email!=''){
                SendMail($data->email, $message, 'Azbooking.vn – Xác nhận đặt phòng');
            }
            echo "<script>alert('$mes')</script>";
            $link_web=SITE_NAME.'/khach-san/';
            echo "<script>window.location.href='$link_web';</script>";
        }else{
            echo "<script>alert('Bạn vui lòng điền đầy đủ thông tin đặt phòng')</script>";
        }
    }
}
function contact()
{
    if (isset($_POST['name_contact'])) {

        $ten=addslashes(strip_tags($_POST['name_contact']));
        $email=addslashes(strip_tags($_POST['email_contact']));
        $dienthoai=addslashes(strip_tags($_POST['phone_contact']));
        $diachi=addslashes(strip_tags($_POST['address_contact']));
        $noidung=addslashes(strip_tags($_POST['message_contact']));
        if($ten==""||$email==""||$dienthoai=="")
        {
            echo "<script>alert('Bạn vui lòng điền đẩy đủ thông tin liên hệ')</script>";
        }
        else
        {
            $new = new contact();
            $new->name_kh=$ten;
            $new->email=$email;
            $new->phone=$dienthoai;
            $new->address=$diachi;
            $new->content=$noidung;
            $new->status=0;
            $new->created=date(DATETIME_FORMAT);
            contact_insert($new);
            $link_web=SITE_NAME;
            $subject = "Azbooking.org thông báo liên hệ từ khách hàng";
            $message='';
            $message .='<div style="float: left; width: 100%">

                            <p>Tên khách hàng: <span style="color: #132fff; font-weight: bold">'.$ten.'</span>,</p>
                            <p>Email: <span style="color: #132fff; font-weight: bold">'.$email.'</span>,</p>
                            <p>Số điện thoại: <span style="color: #132fff; font-weight: bold">'.$dienthoai.'</span>,</p>
                            <p>Địa chỉ: <span style="color: #132fff; font-weight: bold">'.$diachi.'</span>,</p>
                            <p>Ngày gửi: <span style="color: #132fff; font-weight: bold">'.date(DATETIME_FORMAT).'</span>,</p>
                            <p>'.$noidung.'</p>


                        </div>';
            SendMail('tungtv.soict@gmail.com', $message, $subject);
            echo "<script>alert('Dulichchauau.org cảm ơn quý khách đã gửi liên hệ đến chúng tôi, Dulichchauau.org sẽ liên hệ với bạn sớm nhất, xin cảm ơn!')</script>";

            echo "<script>window.location.href='$link_web';</script>";

        }

    }
}
function checkPostParamSecurity($param)
{
    if (isset($_POST[$param])) {
        return addslashes(strip_tags($_POST[$param]));
    } else {
        return false;
    }

}
function _returnGetDateTime()
{
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    return date('Y-m-d H:i:s');
}

function returnCountData(){

    if(isset($_SESSION['Quyen'])){
        if($_SESSION['Quyen']==1){
            $count_dangky=booking_hotel_count('status=0');
            $_SESSION['booking_hotel']=$count_dangky;
            $count_contact=contact_count('status=0');
            $_SESSION['contact']=$count_contact;
            $count_booking=booking_tour_count('status=0');
            $_SESSION['booking']=$count_booking;
        }
        else{
            exit;
        }

    }

}
function returnRoomPrice($room){
    $room_rest=array();
    $arr_rom=explode('/',$room);
    if(count($arr_rom)>0){
        foreach($arr_rom as $val){
            $array_room_price=explode('-',$val);
            if(count($array_room_price)>0){
                if(isset($array_room_price[0])&&isset($array_room_price[1])){
                    $room_data=khachsan_room_price_getById($array_room_price[0]);
                   if(count($room_data)>0){
                       $name=$room_data[0]->name;
                       $number=$array_room_price[1];
                       $price='Liên hệ';
                       $sub_total='Liên hệ';
                       if($room_data[0]->price>0){
                           $price=number_format((int)$room_data[0]->price,0,",",".").'vnđ';
                           $sub_total=number_format($room_data[0]->price*$array_room_price[1],0,",",".").'vnđ';
                       }
                        $item=array(
                            'name'=>$name,
                            'number'=>$number,
                            'price'=>$price,
                            'sub_total'=>$sub_total
                        );
                       array_push($room_rest,$item);
                   }
                }
            }
        }
    }
    return  $room_rest;

}