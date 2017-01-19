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
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
////
$data['tour_PROMOTIONS']=tour_getByTop(5,'promotion=1 ','id desc');
$data['tour_sales']=tour_getByTop(5,'price_sales!="" ','id desc');
$data['tintuc_index']=news_getByTop(5,'','id desc');
$date_now=_returnGetDateTime();
$data['tour_count_down']=tour_getByTop(3,'count_down!="" and count_down>"'.$date_now.'"','id desc');

$data['khachsan_index']=khachsan_getByTop(9,'highlights=1 ','id desc');
$data['video_index']=video_getByTop(1,'','id desc');

$data['tieuchi']=tieuchi_getByTop('','','position asc');


$title=$data['menu'][0]->title;
$description=$data['menu'][0]->description;
$keyword=$data['menu'][0]->keyword;
$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';
show_header($title,$description,$keywords,$data);
show_menu($data,'trangchu');
show_slide($data);
show_index($data);
show_footer($data);
