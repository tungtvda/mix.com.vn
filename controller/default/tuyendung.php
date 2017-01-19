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
$data['current']=isset($_GET['page'])?$_GET['page']:'1';;
$data['pagesize']=9;
$data['count']=tuyendung_count('');
$data['danhsach']=tuyendung_getByPaging($data['current'],$data['pagesize'],'id desc','');
$data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/tuyen-dung/');
$name=$data['menu'][11]->name;
$data['banner']=array(
    'banner_img'=>$data['menu'][11]->img,
    'name'=>$name,
    'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
);
$data['link_anh']=$data['menu'][11]->img;
$title=$data['menu'][11]->title;
$description=$data['menu'][11]->description;
$keyword=$data['menu'][11]->keyword;

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
show_menu($data,'tuyendung');
show_banner($data);
show_dichvu($data);
show_left_danhmuc($data);
show_footer($data);
