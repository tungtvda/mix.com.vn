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
if(isset($_GET['thoigian_timkiem'])&&$_GET['thoigian_timkiem']!=""){
    $thoigian_timkiem=mb_strtolower(addslashes(strip_tags($_GET['thoigian_timkiem'])));
    if($demkt==1)
    {
        $dk .='  durations = "'.$thoigian_timkiem.'"';
    }
    else{
        $dk .=' and durations = "'.$thoigian_timkiem.'"';
    }
    $demkt++;
}
if(isset($_GET['departure'])&&$_GET['departure']!=""){
    $departure=mb_strtolower(addslashes(strip_tags($_GET['departure'])));
    if($demkt==1)
    {
        $dk .='  departure = "'.$departure.'"';
    }
    else{
        $dk .=' and departure = "'.$departure.'"';
    }
    $demkt++;
}

if(isset($_GET['danhmuc_tour_1'])&&$_GET['danhmuc_tour_1']!=""){
    $danhmuc_tour_1=mb_strtolower(addslashes(strip_tags($_GET['danhmuc_tour_1'])));
    if($danhmuc_tour_1=="tour_trong_nuoc"||$danhmuc_tour_1=="tour_quoc_te")
    {
        if($danhmuc_tour_1=="tour_trong_nuoc")
        {
            $diemden='  tour_quoc_te = 0';
        }
        else{
            $diemden='  tour_quoc_te = 1';
        }

        if($demkt==1)
        {
            $dk .=$diemden;
        }
        else{
            $dk .=' and '.$diemden;
        }
    }
    else{
        $timkiem_check=1;
        if($demkt==1)
        {
            $dk .='  DanhMuc1Id ='.$danhmuc_tour_1;
        }
        else{
            $dk .=' and DanhMuc1Id ='.$danhmuc_tour_1;
        }
    }

    $demkt++;
}
if(isset($_GET['danhmuc_tour_2'])&&$_GET['danhmuc_tour_2']!=""&&$_GET['danhmuc_tour_2']!=1){
    $danhmuc_tour_2=mb_strtolower(addslashes(strip_tags($_GET['danhmuc_tour_2'])));
    $timkiem_check=1;
    if($demkt==1)
    {
        $dk .='  DanhMuc2Id ='.$danhmuc_tour_2;
    }
    else{
        $dk .=' and DanhMuc2Id ='.$danhmuc_tour_2;
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
$data['danhsach']=tour_getByTop('',$dk,'id desc');
$name=$data['menu'][5]->name;
$data['banner']=array(
    'banner_img'=>$data['menu'][5]->img,
    'name'=>$name,
    'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
);
$data['link_anh']=$data['menu'][5]->img;
$title=$data['menu'][5]->title;
$description=$data['menu'][5]->description;
$keyword=$data['menu'][5]->keyword;


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
show_menu($data,'tour');
show_banner($data);
show_timkiem_tour($data);
show_left_danhmuc($data);
show_footer($data);
