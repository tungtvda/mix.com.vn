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

if(isset($_GET['value'])&&$_GET['value']!=""){
    $key_timkiem=mb_strtolower(addslashes(strip_tags($_GET['value'])));
    $dk_tour='name LIKE "%'.$key_timkiem.'%" or durations LIKE "%'.$key_timkiem.'%" or name_url LIKE "%'.$key_timkiem.'%" or title LIKE "%'.$key_timkiem.'%" or price LIKE "%'.$key_timkiem.'%"';
    $data['danhsach_tour']=tour_getByTop('',$dk_tour,'id desc');

    $dk_khachsan='name LIKE "%'.$key_timkiem.'%" or start LIKE "%'.$key_timkiem.'%" or name_url LIKE "%'.$key_timkiem.'%" or title LIKE "%'.$key_timkiem.'%" or price LIKE "%'.$key_timkiem.'%"';
    $data['danhsach_khachsan']=khachsan_getByTop('',$dk_khachsan,'id desc');

    $dk_tintuc='name LIKE "%'.$key_timkiem.'%"  or name_url LIKE "%'.$key_timkiem.'%" or title LIKE "%'.$key_timkiem.'%" ';
    $data['danhsach_tintuc']=news_getByTop('',$dk_tintuc,'id desc');
}
else{
    redict(SITE_NAME);
}
$name=$data['menu'][8]->name;
$data['banner']=array(
    'banner_img'=>$data['menu'][8]->img,
    'name'=>$name,
    'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
);
$data['link_anh']=$data['menu'][8]->img;
$title=$data['menu'][8]->title;
$description=$data['menu'][8]->description;
$keyword=$data['menu'][8]->keyword;


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
show_timkiem($data);
show_left_danhmuc($data);
show_footer($data);
