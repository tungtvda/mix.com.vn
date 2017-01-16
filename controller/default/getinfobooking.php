<?php


if(!defined('DIR')) require_once '../../config.php';
require_once DIR.'/model/booking_hotelService.php';
require_once DIR.'/model/khachsanService.php';
if (isset($_POST['id']))
{
    $string='';
    $Id = addslashes(strip_tags($_POST['id']));
    $data =booking_hotel_getById($Id);
    if(count($data)>0){
        $data_khachsan =khachsan_getById($data[0]->hotel_id);
        if(count($data_khachsan)>0)
        {
            $first_date = strtotime($data[0]->from_date);
            $second_date = strtotime($data[0]->to_date);
            $datediff = abs($first_date - $second_date);
            $songay= floor($datediff / (60*60*24));

            $status='Đang chờ xử lý';
            $link_update_status=' <a class="update_booking_hotel" countid="'.$data[0]->id.'" href="javascript:void(0)" style="color: #4285f4"> Cập nhật trạng thái</a>';
            if($data[0]->status==1){
                $status='Đã xử lý';
                $link_update_status='';
            }
            $tongtien=number_format($data[0]->total_price,0,",",".").' vnđ';
            if($data[0]->total_price='Liên hệ'||$data[0]->total_price='Liên Hệ'||$data[0]->total_price='LIÊN HỆ'||$data[0]->total_price='liên hệ')
            {

            }
            $string=' <table class="table table-bordered table-invoice">
                    <tbody><tr>
                        <td class="width30">Khách sạn:</td>
                        <td class="width70"><strong>'.$data_khachsan[0]->name.'</strong></td>
                    </tr>
                    <tr>
                        <td>Điện thoại:</td>
                        <td>'.$data_khachsan[0]->phone.'</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>'.$data_khachsan[0]->email.'</td>
                    </tr>
                    <tr>
                        <td>Ngày check-in:</td>
                        <td>'.date('d-m-Y', strtotime(date($data[0]->from_date))).'</td>
                    </tr>
                    <tr>
                        <td>Ngày check-out:</td>
                        <td>'.date('d-m-Y', strtotime(date($data[0]->to_date))).'</td>
                    </tr>
                    <tr>
                        <td>Số người:</td>
                        <td>'.$data[0]->num_member.'</td>
                    </tr>
                    <tr>
                        <td>Trạng thái:</td>
                        <td>123123123</td>
                    </tr>
                    <tr>
                        <td>Ngày đặt:</td>
                        <td>'.$status.'.'. $link_update_status .'</td>
                    </tr>
                    <tr>
                        <td>Tổng tiền:</td>
                        <td style="font-size: 14px; font-weight: bold; color: red">'.$tongtien.'</td>
                    </tr>

                    </tbody></table>';

            $string.='<table class="table_hidden table table-bordered dataTable" hidden="" id="table_38" style="display: table;">


                    <tbody><tr><th>Loại phòng</th><th>Số lượng phòng</th><th>Số ngày</th><th>Đơn giá</th><th>Thành tiền</th></tr>';
            $data_rest=returnRoomPrice($data[0]->price_room);
            if(count($data_rest)){
                foreach($data_rest as $row){
                    $name=$row['name'];
                    $number=$row['number'];
                    $price=$row['price'];
                    $sub_total=$row['sub_total'];
                    $string.='<tr><td>'.$name.'</td><td>'.$number.'</td><td>'.$songay.'</td><td>'.$price.'</td><td style="font-size: 14px; font-weight: bold; color: red">'.$sub_total.'</td></tr>';
                }
            }


            $string.='</tbody>
                </table>';
        }


    }else{
        $string= 'Hệ thống đang cập nhật dữ liệu';
    }
    echo $string;

}