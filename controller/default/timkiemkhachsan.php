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
if(isset($_GET['sao_timkiem'])&&$_GET['sao_timkiem']!=""){
    $sao_timkiem=mb_strtolower(addslashes(strip_tags($_GET['sao_timkiem'])));
    if($demkt==1)
    {
        $dk .='  start ='.$sao_timkiem;
    }
    else{
        $dk .=' or start ='.$sao_timkiem;
    }
    $demkt++;
}
if(isset($_GET['gia_timkiem'])&&$_GET['gia_timkiem']!=""){
    $gia_timkiem=mb_strtolower(addslashes(strip_tags($_GET['gia_timkiem'])));
    $ar_exlode=explode('-',$gia_timkiem);
    if(isset($ar_exlode[0])&&isset($ar_exlode[1])){
        $field0=mb_strtolower(addslashes(strip_tags($ar_exlode[0])));
        $field1=mb_strtolower(addslashes(strip_tags($ar_exlode[1])));
        $field="price";
        $find=" $field0 <= $field and $field <= $field1";
    }
    else{
        $field0=mb_strtolower(addslashes(strip_tags($ar_exlode[0])));
        $find="  $field = $field0";
    }
    if($demkt==1)
    {
        $dk .=$find;
    }
    else
    {
        $dk .=' or '.$find;
    }
    $demkt++;
}
if($dk==""){
    redict(SITE_NAME);
}

if($dk==""){
    redict(SITE_NAME);
}
$data['danhsach']=khachsan_getByTop('',$dk,'id desc');
$name=$data['menu'][6]->name;
$data['banner']=array(
    'banner_img'=>$data['menu'][6]->img,
    'name'=>$name,
    'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
);
$data['link_anh']=$data['menu'][6]->img;
$title=$data['menu'][6]->title;
$description=$data['menu'][6]->description;
$keyword=$data['menu'][6]->keyword;


$data['tab_tour_title']='';
$data['tab_khachsan_title']='active_tab_left';
$data['tab_tintuc_title']='';

$data['tab_tour']='hidden';
$data['tab_khachsan']='';
$data['tab_tintuc']='hidden';

$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';
show_header($title,$description,$keywords,$data);
show_menu($data,'khachsan');
show_banner($data);
show_timkiem_khachsan($data);
show_left_danhmuc($data);
show_footer($data);
