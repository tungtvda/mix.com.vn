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
if(!isset($_GET['name_url'])){
    redict(SITE_NAME);
}
$id=addslashes(strip_tags($_GET['name_url']));
$data['detail']=tuyendung_getByTop('1','name_url="'.$id.'"','');
if(count($data['detail'])==0){
    redict(SITE_NAME);
}
$url='';
$banner='';
$link_detail='';
$url='<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><a href="'.SITE_NAME.'/tuyen-dung/">'.$data['menu'][2]->name.'</a></li><li><span>'.$data['detail'][0]->name.'</span></li>';
$banner=$data['menu'][11]->img;
$link_detail=link_tuyendung($data['detail'][0]);

$data['banner']=array(
    'banner_img'=>$banner,
    'name'=>$data['detail'][0]->name,
    'url'=>$url
);
$title=$data['detail'][0]->title;
$description=$data['detail'][0]->description;
$keyword=$data['detail'][0]->keyword;
$data['link_anh']=$data['detail'][0]->img;
$data['link_url']=$link_detail;
$data['tour_lienquan']=tuyendung_getByTop(6,'id!='.$data['detail'][0]->id,'id desc');

$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';

$data['tab_tour_title']='';
$data['tab_khachsan_title']='';
$data['tab_tintuc_title']='active_tab_left';

$data['tab_tour']='hidden';
$data['tab_khachsan']='hidden';
$data['tab_tintuc']='';

show_header($title,$description,$keywords,$data);
show_menu($data,'tuyendung');
show_banner($data);
show_chitiet_dichvu($data);
show_left_danhmuc($data);
show_footer($data);
