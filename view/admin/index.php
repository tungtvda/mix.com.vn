<?php
require_once DIR . '/common/paging.php';
require_once DIR . '/common/cls_fast_template.php';
function view_index($data)
{
    $ft = new FastTemplate(DIR . '/view/admin/templates');
    $ft->assign('count_contact',$_SESSION['contact']);
    $ft->assign('booking_hotel',$_SESSION['booking_hotel']);
    $ft->assign('count_booking',$_SESSION['booking']);
    $ft->assign('USER-NAME', isset($data['username']) ? $data['username'] : '');
    $ft->define('header', 'header.tpl');
    $ft->define('body', 'body.tpl');
    $ft->define('footer', 'footer.tpl');

    $ft->assign('TAB1-CLASS', "");
    $ft->assign('TAB2-CLASS', "current");


    $ft->assign('NOTIFICATION-CONTENT', isset($data['notififation_content']) ? $data['notififation_content'] : '');
    $ft->assign('TABLE-HEADER', '');
    $ft->assign('PAGING', '');
    $ft->assign('TABLE-BODY', '');
    $ft->assign('TABLE-NAME', ' Dashboard');
    $ft->assign('CONTENT-BOX-LEFT', isset($data['content_box_left']) ? $data['content_box_left'] : '');
    $ft->assign('CONTENT-BOX-RIGHT', isset($data['content_box_right']) ? $data['content_box_right'] : ' ');
    $ft->assign('NOTIFICATION', isset($data['notification']) ? $data['notification'] : ' ');
    $ft->assign('SITE-NAME', isset($data['sitename']) ? $data['sitename'] : SITE_NAME);
    $ft->assign('an', 'hidden');
    $ft->assign('kichhoat', 'active');
    $ft->assign('FORM', showFrom('', ''));
    //
    print $ft->parse_and_return('header');
    print $ft->parse_and_return('body');
    print $ft->parse_and_return('footer');
}

function showFrom($form, $ListKey = array())
{
    $str_from = '';
    $str_from .= '<div class="row-fluid">';
    $str_from .= '<div class="span12">';
    $str_from .= '<ul class="widgeticons row-fluid">';
    if( $_SESSION["Quyen"]==1) {
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/admin.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/admin.png" alt="" class=""><span>Tài khoản quản trị</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/config.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/cauhinh.png" alt="" class=""><span>Cấu hình hệ thống</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/booking_hotel.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/cart.png" alt="" class=""><span>Đặt phòng khách sạn</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/booking_tour.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/cart.png" alt="" class=""><span>Đặt tour</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/contact.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/lienhe.png" alt="" class=""><span>Liên hệ</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/tour.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/sanpham.png" alt="" class=""><span>Tour</span></a></li>';

        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/tintuc.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/tintuc.png" alt="" class=""><span>Tin tức</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/info_mix.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/gioithieu.png" alt="" class=""><span>Giới thiệu</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/subport.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/hotro.png" alt="" class=""><span>Hỗ trợ trực tuyến</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/video.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/video.png" alt="" class=""><span>Video</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/slide.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/slide.png" alt="" class=""><span>Slide</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/menu.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/menu.png" alt="" class=""><span>Cấu hình menu</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/mangxahoi.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/mangxahoi.png" alt="" class=""><span>Mạng xã hội</span></a></li>';
        $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/video/tieuchi.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/tieuchi.png" alt="" class=""><span>Tiêu chí</span></a></li>';
    }
    $str_from .= '<li class="one_fifth"><a href="' . SITE_NAME . '/controller/admin/khachsan.php"><img src="' . SITE_NAME . '/view/admin/Themes/images/imgadmin/album.png" alt="" class=""><span>Khách sạn</span></a></li>';
    $str_from .= '</ul></div></div>';
    return $str_from;
}
