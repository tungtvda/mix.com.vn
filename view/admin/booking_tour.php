<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_booking_tour($data)
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
    $ft->assign('TABLE-NAME','booking_tour');
    $ft->assign('CONTENT-BOX-LEFT',isset($data['content_box_left'])?$data['content_box_left']:'');
    $ft->assign('CONTENT-BOX-RIGHT',isset($data['content_box_right'])?$data['content_box_right']:' ');
    $ft->assign('NOTIFICATION',isset($data['notification'])?$data['notification']:' ');
    $ft->assign('SITE-NAME',isset($data['sitename'])?$data['sitename']:SITE_NAME);
    $ft->assign('kichhoat_dathang', 'active');
    $ft->assign('FORM',showFrom(isset($data['form'])?$data['form']:'',isset($data['listfkey'])?$data['listfkey']:array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}
//
function showTableHeader()
{
    return '<th>id</th><th>name_tour</th><th>name_customer</th><th>phone</th><th>email</th><th>status</th><th>created</th>';
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
        $TableBody.="<td>".$obj->id."</td>";
        $TableBody.="<td>".$obj->name_tour."</td>";
        $TableBody.="<td>".$obj->name_customer."</td>";
        $TableBody.="<td>".$obj->phone."</td>";
        $TableBody.="<td>".$obj->email."</td>";
        $TableBody.="<td>".$obj->status."</td>";
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
    $str_from.='<p><label>tour_id</label><input class="text-input small-input" type="text"  name="tour_id" value="'.(($form!=false)?$form->tour_id:'').'" /></p>';
    $str_from.='<p><label>name_tour</label><input class="text-input small-input" type="text"  name="name_tour" value="'.(($form!=false)?$form->name_tour:'').'" /></p>';
    $str_from.='<p><label>name_customer</label><input class="text-input small-input" type="text"  name="name_customer" value="'.(($form!=false)?$form->name_customer:'').'" /></p>';
    $str_from.='<p><label>language</label><input class="text-input small-input" type="text"  name="language" value="'.(($form!=false)?$form->language:'').'" /></p>';
    $str_from.='<p><label>phone</label><input class="text-input small-input" type="text"  name="phone" value="'.(($form!=false)?$form->phone:'').'" /></p>';
    $str_from.='<p><label>email</label><input class="text-input small-input" type="text"  name="email" value="'.(($form!=false)?$form->email:'').'" /></p>';
    $str_from.='<p><label>address</label><input class="text-input small-input" type="text"  name="address" value="'.(($form!=false)?$form->address:'').'" /></p>';
    $str_from.='<p><label>departure_day</label><input class="text-input small-input" type="text"  name="departure_day" value="'.(($form!=false)?$form->departure_day:'').'" /></p>';
    $str_from.='<p><label>adults</label><input class="text-input small-input" type="text"  name="adults" value="'.(($form!=false)?$form->adults:'').'" /></p>';
    $str_from.='<p><label>children_5_10</label><input class="text-input small-input" type="text"  name="children_5_10" value="'.(($form!=false)?$form->children_5_10:'').'" /></p>';
    $str_from.='<p><label>children_5</label><input class="text-input small-input" type="text"  name="children_5" value="'.(($form!=false)?$form->children_5:'').'" /></p>';
    $str_from.='<p><label>price</label><input class="text-input small-input" type="text"  name="price" value="'.(($form!=false)?$form->price:'').'" /></p>';
    $str_from.='<p><label>price_children</label><input class="text-input small-input" type="text"  name="price_children" value="'.(($form!=false)?$form->price_children:'').'" /></p>';
    $str_from.='<p><label>price_children_under_5</label><input class="text-input small-input" type="text"  name="price_children_under_5" value="'.(($form!=false)?$form->price_children_under_5:'').'" /></p>';
    $str_from.='<p><label>total_price</label><input class="text-input small-input" type="text"  name="total_price" value="'.(($form!=false)?$form->total_price:'').'" /></p>';
    $str_from.='<p><label>request</label><textarea name="request">'.(($form!=false)?$form->request:'').'</textarea><script type="text/javascript">CKEDITOR.replace(\'request\'); </script></p>';
    $str_from.='<p><label>status</label><input  type="checkbox"  name="status" value="1" '.(($form!=false)?(($form->status=='1')?'checked':''):'').' /></p>';
    $str_from.='<p><label>created</label><input class="text-input small-input" type="text"  name="created" value="'.(($form!=false)?$form->created:'').'" /></p>';
    return $str_from;
}
