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
require_once DIR . '/common/class.phpmailer.php';
require_once(DIR . "/common/Mail.php");
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
if(!isset($_GET['name_url'])){
    redict(SITE_NAME);
}
$id=addslashes(strip_tags($_GET['name_url']));
$data['detail']=khachsan_getByTop('1','name_url="'.$id.'"','');
if(count($data['detail'])==0){
    redict(SITE_NAME);

}
$data['list_images']=khachsan_img_getByTop('','danhmuc_id='.$data['detail'][0]->id,'position asc');
$data['list_phong']=khachsan_room_price_getByTop('','danhmuc_id='.$data['detail'][0]->id,'id desc');
$url='';
$banner='';
$link_detail='';
$danhmuc_1 = danhmuc_khachsan_getById($data['detail'][0]->danhmuc_id);
if(count($danhmuc_1)>0)
{
    $url='<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><a href="'.SITE_NAME.'/khach-san/">'.$data['menu'][2]->name.'</a></li><li><a href="'.SITE_NAME.'/khach-san/'.$danhmuc_1[0]->name_url.'/">'.$danhmuc_1[0]->name.'</a></li><li><span>'.$data['detail'][0]->name.'</span></li>';
    $banner=$danhmuc_1[0]->img;
    $link_detail=link_khachsandetail($data['detail'][0],$danhmuc_1[0]->name_url,'');
}
else{
    redict(SITE_NAME);
}
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
$data['tour_lienquan']=khachsan_getByTop(6,'id!='.$data['detail'][0]->id.' and danhmuc_id='.$data['detail'][0]->danhmuc_id,'id desc');

$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';


show_header($title,$description,$keywords,$data);
show_menu($data,'khachsan');
show_banner($data);
show_chitiet_khachsan($data);
show_footer($data);
bookingHotel($data['detail'][0]);