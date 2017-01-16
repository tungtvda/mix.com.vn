<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_booking_hotel($data)
{
    $ft=new FastTemplate(DIR.'/view/admin/templates');
    $ft->assign('count_contact',$_SESSION['contact']);
    $ft->assign('booking_hotel',$_SESSION['booking_hotel']);
    $ft->assign('count_booking',$_SESSION['booking']);
    $ft->define('header','header.tpl');
    $ft->define('body','body.tpl');
    $ft->define('footer','footer.tpl');
    //
    $ft->assign('TAB1-CLASS',isset($data['tab1_class'])?$data['tab1_class']:'');
    $ft->assign('TAB2-CLASS',isset($data['tab2_class'])?$data['tab2_class']:'');
    $ft->assign('USER-NAME',isset($data['username'])?$data['username']:'');
    $ft->assign('NOTIFICATION-CONTENT',isset($data['notififation_content'])?$data['notififation_content']:'');
    $ft->assign('TABLE-HEADER',showTableHeader());
    $ft->assign('PAGING',showPaging($data['count_paging'],20,$data['page']));
    $ft->assign('TABLE-BODY',showTableBody($data['table_body']));
    $ft->assign('TABLE-NAME','booking_hotel');
    $ft->assign('CONTENT-BOX-LEFT',isset($data['content_box_left'])?$data['content_box_left']:'');
    $ft->assign('CONTENT-BOX-RIGHT',isset($data['content_box_right'])?$data['content_box_right']:' ');
    $ft->assign('NOTIFICATION',isset($data['notification'])?$data['notification']:' ');
    $ft->assign('SITE-NAME',isset($data['sitename'])?$data['sitename']:SITE_NAME);
    $ft->assign('kichhoat_booking_hotel', 'active');
    $ft->assign('FORM',showFrom(isset($data['form'])?$data['form']:'',isset($data['listfkey'])?$data['listfkey']:array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}
//
function showTableHeader()
{
    return '<th>name_hotel</th><th>phone</th><th>email</th><th>from_date</th><th>to_date</th><th>num_member</th><th>total_price</th><th>Phòng</th><th>created</th>';
}
//
function showTableBody($data)
{
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        if($obj->status==0){
            $font='font-weight: bold; background-color: #e6e6e6';
        }
        else{
            $font='';
        }
        $TableBody.="<tr style='".$font."'>
        <td><input type=\"checkbox\" name=\"check_".$obj->id."\"/></td>";
        $TableBody.="<td>".$obj->name_hotel."</td>";
        $TableBody.="<td>".$obj->phone."</td>";
        $TableBody.="<td>".$obj->email."</td>";
        $TableBody.="<td>".$obj->from_date."</td>";
        $TableBody.="<td>".$obj->to_date."</td>";
        $TableBody.="<td>".$obj->num_member."</td>";
        if($obj->total_price>0){
            $TableBody.="<td>". number_format((int)$obj->total_price,0,",",".")." vnđ </td>";
        }
        else{
            $TableBody.="<td>Liên hệ</td>";
        }


        $TableBody.="<td>";
        if($obj->price_room!='')
        {
            $TableBody.="<a countid='$obj->id' class='show_table_detail' href='javascript:void(0)' style='font-size: 13px; font-weight: normal'>Thông tin phòng</a>
            <table class='table_hidden' hidden id='table_$obj->id'>
            <tr><th>Loại phòng</th><th>Số lượng</th><th>Đơn giá</th><th>Thành tiền</th></tr>";
            $data_rest=returnRoomPrice($obj->price_room);
            if(count($data_rest)){
                foreach($data_rest as $row){
                    $name=$row['name'];
                    $number=$row['number'];
                    $price=$row['price'];
                    $sub_total=$row['sub_total'];
                    $TableBody.="
                    <tr><td>$name</td><td>$number</td><td>$price</td><td>$sub_total</td></tr>";
                }
            }
            $TableBody.="</table>";
        }

        $TableBody.="</td>";
        $TableBody.="<td>".$obj->created."</td>";
        $TableBody.="<td><a href=\"?action=edit&id=".$obj->id."\" title=\"Edit\"><img src=\"".SITE_NAME."/view/admin/Themes/images/pencil.png\" alt=\"Edit\"></a>";
        $TableBody.="<a href=\"?action=delete&id=".$obj->id."\" title=\"Delete\" onClick=\"return confirm('Bạn có chắc chắc muốn xóa?')\"><img src=\"".SITE_NAME."/view/admin/Themes/images/cross.png\" alt=\"Delete\"></a> ";
        $TableBody.="</td>";

        $TableBody.="</tr>";
    }
    return $TableBody;
}
//
function showFrom($form,$ListKey=array())
{
    $str_from='';
    $str_from.='<p><label>hotel_id</label><input class="text-input small-input" type="text"  name="hotel_id" value="'.(($form!=false)?$form->hotel_id:'').'" /></p>';
    $str_from.='<p><label>name_hotel</label><input class="text-input small-input" type="text"  name="name_hotel" value="'.(($form!=false)?$form->name_hotel:'').'" /></p>';
    $str_from.='<p><label>name_customer</label><input class="text-input small-input" type="text"  name="name_customer" value="'.(($form!=false)?$form->name_customer:'').'" /></p>';
    $str_from.='<p><label>phone</label><input class="text-input small-input" type="text"  name="phone" value="'.(($form!=false)?$form->phone:'').'" /></p>';
    $str_from.='<p><label>email</label><input class="text-input small-input" type="text"  name="email" value="'.(($form!=false)?$form->email:'').'" /></p>';
    $str_from.='<p><label>address</label><input class="text-input small-input" type="text"  name="address" value="'.(($form!=false)?$form->address:'').'" /></p>';
    $str_from.='<p><label>from_date</label><input class="text-input small-input" type="text"  name="from_date" value="'.(($form!=false)?$form->from_date:'').'" /></p>';
    $str_from.='<p><label>to_date</label><input class="text-input small-input" type="text"  name="to_date" value="'.(($form!=false)?$form->to_date:'').'" /></p>';
    $str_from.='<p><label>num_member</label><input class="text-input small-input" type="text"  name="num_member" value="'.(($form!=false)?$form->num_member:'').'" /></p>';
    $str_from.='<p><label>price</label><input class="text-input small-input" type="text"  name="price" value="'.(($form!=false)?$form->price:'').'" /></p>';

    if($form!=false&&$form->price_room!='')
    {
        $str_from.="
            <table class=\"table table-bordered dataTable\" id=\"dyntable\" aria-describedby=\"dyntable_info\"   id='table_$form->id'>
            <tr><th>Loại phòng</th><th>Số lượng</th><th>Đơn giá</th><th>Thành tiền</th></tr>";
        $data_rest=returnRoomPrice($form->price_room);
        if(count($data_rest)){
            foreach($data_rest as $row){
                $name=$row['name'];
                $number=$row['number'];
                $price=$row['price'];
                $sub_total=$row['sub_total'];
                $str_from.="
                    <tr><td>$name</td><td>$number</td><td>$price</td><td>$sub_total</td></tr>";
            }
        }
        $str_from.="</table>";
    }


    $str_from.='<p><label>price_room</label><input class="text-input small-input" type="text"  name="price_room" value="'.(($form!=false)?$form->price_room:'').'" /></p>';
    $str_from.='<p><label>total_price</label><input class="text-input small-input" type="text"  name="total_price" value="'.(($form!=false)?$form->total_price:'').'" /></p>';
    $str_from.='<p><label>request</label><textarea name="request">'.(($form!=false)?$form->request:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'request\'); </script></p>';
    $str_from.='<p><label>status</label><input  type="checkbox"  name="status" value="1" '.(($form!=false)?(($form->status=='1')?'checked':''):'').' /></p>';
    $str_from.='<p><label>created</label><input class="text-input small-input" type="text"  name="created" value="'.(($form!=false)?$form->created:'').'" /></p>';
    return $str_from;
}
