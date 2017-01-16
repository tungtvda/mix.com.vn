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
$dk='';
$demkt=1;
if(isset($_GET['key_timkiem'])&&$_GET['key_timkiem']!=""){
    $key_timkiem=mb_strtolower(addslashes(strip_tags($_GET['key_timkiem'])));
    $dk.='name LIKE "%'.$key_timkiem.'%"';
    $demkt++;
}

if(isset($_GET['danhmuc_id'])&&$_GET['danhmuc_id']!=""){
    $quocgia_timkiem=mb_strtolower(addslashes(strip_tags($_GET['danhmuc_id'])));
    if($demkt==1)
    {
        $dk .='  danhmuc_id ='.$quocgia_timkiem;
    }
    else{
        $dk .=' or danhmuc_id ='.$quocgia_timkiem;
    }
    $demkt++;
}

if($dk==""){
    redict(SITE_NAME);
}

if($dk==""){
    redict(SITE_NAME);
}
$data['danhsach']=news_getByTop('',$dk,'id desc');
$name=$data['menu'][7]->name;
$data['banner']=array(
    'banner_img'=>$data['menu'][7]->img,
    'name'=>$name,
    'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
);
$data['link_anh']=$data['menu'][7]->img;
$title=$data['menu'][7]->title;
$description=$data['menu'][7]->description;
$keyword=$data['menu'][7]->keyword;


$data['tab_tour_title']='';
$data['tab_khachsan_title']='';
$data['tab_tintuc_title']='active_tab_left';

$data['tab_tour']='hidden';
$data['tab_khachsan']='hidden';
$data['tab_tintuc']='';

$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';
show_header($title,$description,$keywords,$data);
show_menu($data,'tintuc');
show_banner($data);
show_timkiem_tintuc($data);
show_left_danhmuc($data);
show_footer($data);
