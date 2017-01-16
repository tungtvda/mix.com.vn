<?php
require_once DIR.'/common/paging.php';
require_once DIR.'/common/cls_fast_template.php';
function view_khachsan_room_price($data)
{
    $ft=new FastTemplate(DIR.'/view/admin/templates');

    if( $_SESSION["Quyen"]==1){
        $ft->assign('booking_hotel',$_SESSION['booking_hotel']);
        $ft->assign('count_contact',$_SESSION['contact']);
        $ft->assign('count_booking',$_SESSION['booking']);
        $ft->define('header','header.tpl');
        $ft->define('body','body.tpl');
    }
    else{
        $ft->define('header','header_khachsan.tpl');
        $ft->define('body','body_khachsan.tpl');
    }
    $ft->define('footer','footer.tpl');
    //
    $ft->assign('TAB1-CLASS',isset($data['tab1_class'])?$data['tab1_class']:'');
    $ft->assign('TAB2-CLASS',isset($data['tab2_class'])?$data['tab2_class']:'');
    $ft->assign('USER-NAME',isset($data['username'])?$data['username']:'');
    $ft->assign('NOTIFICATION-CONTENT',isset($data['notififation_content'])?$data['notififation_content']:'');
    $ft->assign('TABLE-HEADER',showTableHeader());
    $ft->assign('PAGING',showPaging($data['count_paging'],20,$data['page']));
    $ft->assign('TABLE-BODY',showTableBody($data['table_body']));
    $ft->assign('TABLE-NAME','khachsan_room_price');
    $ft->assign('CONTENT-BOX-LEFT',isset($data['content_box_left'])?$data['content_box_left']:'');
    $ft->assign('CONTENT-BOX-RIGHT',isset($data['content_box_right'])?$data['content_box_right']:' ');
    $ft->assign('NOTIFICATION',isset($data['notification'])?$data['notification']:' ');
    $ft->assign('SITE-NAME',isset($data['sitename'])?$data['sitename']:SITE_NAME);
    $ft->assign('kichhoat_khachsan', 'active');
    $ft->assign('kichhoat_khachsan_hienthi', 'display: block');
    $ft->assign('FORM',showFrom(isset($data['form'])?$data['form']:'',isset($data['listfkey'])?$data['listfkey']:array()));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}
//
function showTableHeader()
{
    return '<th>id</th><th>danhmuc_id</th><th>name</th><th>img</th><th>price</th><th>amount_people</th><th>amount_room</th>';
}
//
function showTableBody($data)
{
    $danhmuc_id_get='';
    if(isset($_GET['danhmuc_id'])&&$_GET['danhmuc_id']!=''){
        $danhmuc_id_get='&danhmuc_id='.$_GET['danhmuc_id'];
    }
    $TableBody='';
    if(count($data)>0) foreach($data as $obj)
    {
        $TableBody.="<tr><td><input type=\"checkbox\" name=\"check_".$obj->id."\"/></td>";
        $TableBody.="<td>".$obj->id."</td>";
        $TableBody.="<td>".$obj->danhmuc_id."</td>";
        $TableBody.="<td>".$obj->name."</td>";
        $TableBody.="<td><img src=\"".$obj->img."\" width=\"50px\" height=\"50px\"/> </td>";
        $TableBody.="<td>".$obj->price."</td>";
        $TableBody.="<td>".$obj->amount_people."</td>";
        $TableBody.="<td>".$obj->amount_room."</td>";
        $TableBody.="<td><a href=\"?action=edit&id=".$obj->id.$danhmuc_id_get."\" title=\"Edit\"><img src=\"".SITE_NAME."/view/admin/Themes/images/pencil.png\" alt=\"Edit\"></a>";
        if( $_SESSION["Quyen"]==1) {
            $TableBody .= "<a href=\"?action=delete&id=" . $obj->id .$danhmuc_id_get. "\" title=\"Delete\" onClick=\"return confirm('Bạn có chắc chắc muốn xóa?')\"><img src=\"" . SITE_NAME . "/view/admin/Themes/images/cross.png\" alt=\"Delete\"></a> ";
        }
        $TableBody.="</td>";
        $TableBody.="</tr>";
    }
    return $TableBody;
}
//
function showFrom($form,$ListKey=array())
{
    if( $_SESSION["Quyen"]==1) {
        $str_from = '';
        $str_from .= '<p><label>danhmuc_id</label>';
        $str_from .= '<select name="danhmuc_id">';
        if(isset($ListKey['danhmuc_id']))
        {
            foreach($ListKey['danhmuc_id'] as $key)
            {
                if(isset($_GET['danhmuc_id'])&&$_GET['danhmuc_id']!=''&&$form==false){
                    $str_from.='<option value="'.$key->id.'" '.(($_GET['danhmuc_id']==$key->id)?'selected':'').'>'.$key->name.'</option>';
                }
                else{
                    $str_from.='<option value="'.$key->id.'" '.(($form!=false)?(($form->danhmuc_id==$key->id)?'selected':''):'').'>'.$key->name.'</option>';
                }

            }
        }
        $str_from .= '</select></p>';
        $str_from .= '<p><label>name</label><input class="text-input small-input" type="text"  name="name" value="' . (($form != false) ? $form->name : '') . '" /></p>';
        $str_from .= '<p><label>img</label><input class="text-input small-input" type="text"  name="img" value="' . (($form != false) ? $form->img : '') . '"/><a class="button" onclick="openKcEditor(\'img\');">Upload ảnh</a></p>';
        $str_from .= '<p><label>description</label><textarea style="width: 100%" name="description">' . (($form != false) ? $form->description : '') . '</textarea></p>';
        $str_from .= '<p><label>dichvu</label><textarea style="width: 100%" name="dichvu">' . (($form != false) ? $form->dichvu : '') . '</textarea></p>';
        $str_from .= '<p><label>price</label><input class="text-input small-input" type="text"  name="price" value="' . (($form != false) ? $form->price : '') . '" /></p>';
        $str_from .= '<p><label>Số người </label><input class="text-input small-input" type="text"  name="amount_people" value="' . (($form != false) ? $form->amount_people : '') . '" /></p>';
        $str_from .= '<p><label>Số lượng phòng</label><input class="text-input small-input" type="text"  name="amount_room" value="' . (($form != false) ? $form->amount_room : '') . '" /></p>';
    }
    else{
        $str_from = '';
        $str_from .= '<p><label>Tên phòng</label>' . (($form != false) ? $form->name : '') . '</p>';
        $str_from .= '<p><label>Số người </label><input class="text-input small-input" type="text"  name="amount_people" value="' . (($form != false) ? $form->amount_people : '') . '" /></p>';
        $str_from .= '<p><label>Số lượng phòng</label><input class="text-input small-input" type="text"  name="amount_room" value="' . (($form != false) ? $form->amount_room : '') . '" /></p>';
    }
    return $str_from;
}
