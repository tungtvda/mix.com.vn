<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
require_once DIR.'/model/danhmuc_room_typeService.php';
function show_chitiet_khachsan($data = array())
{
    $asign = array();
    $asign['name']= $data['detail'][0]->name;
    $asign['address']= $data['detail'][0]->address;
    $asign['email']= $data['detail'][0]->email;
    $asign['phone']= $data['detail'][0]->phone;
    $asign['start_img']= sao($data['detail'][0]->start);


    $asign['tour_lienquan'] ='';
    if(count($data['tour_lienquan'])>0) {
        $asign['tour_lienquan'] = print_item('danhmuc_khachsan', $data['tour_lienquan']);
    }

    $asign['Hotline'] = $data['config'][0]->Hotline;
    $asign['Hotline_hcm'] = $data['config'][0]->Hotline_hcm;
    $asign['img']= $data['detail'][0]->img;
    $asign['content']= $data['detail'][0]->content;
    $content=$data['detail'][0]->content;
    if (strlen($content) > 200) {
        $ten1=strip_tags($content);

        $ten = substr($ten1, 0, 200);
        $asign['content_short'] = substr($ten, 0, strrpos($ten, ' ')) . "...";
    } else {
        $asign['content_short']=strip_tags($content);
    }
    $asign['start']= sao($data['detail'][0]->start);
    $room_type='';
    $string_zoom_type='';
    $data_room=khachsan_room_price_getByTop('','danhmuc_id='.$data['detail'][0]->id,'id desc');
    if(count($data_room)>0){
        $count_room=1;
        foreach($data_room as $row){
            if($count_room==1){
                $room_type.=$row->name;
            }else{
                $room_type.=', '.$row->name;
            }
            $dongia='Liên hệ';
            if($row->price>0){
                $dongia=number_format($row->price,0,",",".").'vnđ';
            }
            $string_zoom_type.=' <tr>
                                            <td>
                                                <label title="Đơn giá: '.$dongia.'"><input  style="height: 14px; width: 14px; margin: 0px" type="checkbox" class="price_room" valueName="'.$row->name.'" value="'.$row->id.'" valuePrice="'.$row->price.'" valueNumber="" id="price_'.$row->id.'" name="price_room[]"> '.$row->name.'</label>
                                            </td>
                                            <td>
                                                <input   style="width: 50px; height: 27px;" type="number" id="number_'.$row->id.'"  min="0" max="'.$row->amount_room.'" name="amount_people_'.$row->id.'">
                                            </td>
                                        </tr>';
            $count_room++;
        }

    }
    $asign['string_zoom_type'] =$string_zoom_type;
    $asign['room_type']=$room_type;
    $asign['price']= $data['detail'][0]->price;
    if($data['detail'][0]->price==0||$data['detail'][0]->price==''){
        $asign['price_format']='Liên hệ';
        $asign['vnd']='';
    }
    else{
        $asign['price_format']= number_format($data['detail'][0]->price,0,",",".");
        $asign['vnd']='vnđ';
    }
    $asign['link']=$data['link_url'];
    $asign['name_url']=$data['detail'][0]->name_url;
    $asign['id']= $data['detail'][0]->id;
    $asign['date_now'] = date('Y-m-d', strtotime(date(DATETIME_FORMAT)));
    $asign['date_now_vn'] = date('d/m/Y', strtotime(date(DATETIME_FORMAT)));

    $asign['list_images'] ='';
    $asign['list_images_icon'] ='';
    if(count($data['list_images'])>0) {
        $asign['list_images'] = print_item('list_images', $data['list_images']);
        $asign['list_images_icon'] = print_item('list_images_icon', $data['list_images']);
    }

//    $asign['list_phong'] ='';
//    if(count($data['list_phong'])>0) {
//        $asign['list_phong'] = print_item('list_phong', $data['list_phong']);
//    }

    $dichvu='';
    if($data['detail'][0]->dichvu!=''){
        $array_ex=explode('-',$data['detail'][0]->dichvu);
        if(count($array_ex)>0){
            foreach($array_ex as $row_dichvu){
                $dichvu.='<div class="item"><i class="awe-icon fa fa-check-square-o "></i> <span>'.trim($row_dichvu).'</span></div>';
            }
        }
    }
    $asign['dichvu']=$dichvu;
    $asign['map']=$data['detail'][0]->map;

    $asign['list_phong'] ='';
    if(count($data['list_phong'])>0) {
        $asign['list_phong'] = print_item('list_phong', $data['list_phong']);
    }

    print_template($asign, 'chitietkhachsan');
}



