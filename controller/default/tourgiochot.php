<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:40 PM
 */
if(!defined('SITE_NAME'))
{
    require_once '../../config.php';
}

require_once DIR.'/controller/default/public.php';
require_once DIR . '/common/paging.php';
require_once DIR . '/common/redict.php';
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
$active='';
$date_now=_returnGetDateTime();
$dk='count_down!="" and count_down>"'.$date_now.'"';
$data_menu=$data['menu'][12];
$link='/tour-gio-chot/';
$data['current']=isset($_GET['page'])?$_GET['page']:'1';;
$data['pagesize']=9;
$data['count']=tour_count($dk);
$data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
$data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . $link);
$name=$data_menu->name;
$data['banner']=array(
    'banner_img'=>$data_menu->img,
    'name'=>$name,
    'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
);
$data['link_anh']=$data_menu->img;
$title=$data_menu->title;
$description=$data_menu->description;
$keyword=$data_menu->keyword;

$data['tab_tour_title']='active_tab_left';
$data['tab_khachsan_title']='';
$data['tab_tintuc_title']='';

$data['tab_tour']='';
$data['tab_khachsan']='hidden';
$data['tab_tintuc']='hidden';




$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';
show_header($title,$description,$keywords,$data);
show_menu($data,'');
show_banner($data);
show_tourgiochot($data);
show_left_danhmuc($data);
show_footer($data);
