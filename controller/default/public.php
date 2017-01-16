<?php
/**
 * Created by PhpStorm.
 * User: ductho
 * Date: 11/20/14
 * Time: 11:00 AM
 */

$array_files=scandir(DIR.'/model');
foreach ($array_files as $filename) {
    $path = DIR.'/model/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
//
$array_files=scandir(DIR.'/view/default');
foreach ($array_files as $filename) {
    $path = DIR.'/view/default/' . $filename;
    if (is_file($path)) {
        require_once $path;
    }
}
function show_header($title,$description,$keyword,$data1=array())
{
    $data=array();
    $data['Title']=$title;
    $data['Description']=$description;
    $data['Keyword']=$keyword;
    $data['config']=$data1['config'];
    if (isset($data1['link_anh'])) {
        $data['link_anh'] = $data1['link_anh'];
    } else {
        $data['link_anh'] = $data1['config'][0]->Logo;
    }
    view_header($data);
}
function show_header2($title,$description,$keyword,$data1=array())
{
    $data=array();
    $data['Title']=$title;
    $data['Description']=$description;
    $data['Keyword']=$keyword;
    $data['config']=$data1['config'];
    $_SESSION['lienhe']=$data['config'][0]->Phone;
    view_header2($data);
}

function  show_slide($data1=array())
{
    $data=array();
    $data['slide']=slide_getByTop('','','Id desc');
    $data['danhmuc_1_timkiem']=danhmuc_1_getByTop('','id!=1','position asc');
    $data['danhmuc_khachsan_timkiem']=danhmuc_khachsan_getByTop('','','position asc');
    $data['danhmuc_tintuc_timkiem']=danhmuc_tintuc_getByTop('','','position asc');
    $data['departure_timkiem']=departure_getByTop('','','position asc');
    view_slide($data);
}

function  show_left($data1=array(),$active='trangchu')
{
    $data=array();
//    $data['danhmuctour_left']=danhmuctour_getByTop('','','ViTri asc');
//    $data['tieude_13']=tieude_getById(13);
//    $data['tin_moinhat']=tintuc_getByTop(10,'','Id desc');
//    $data['quangcao_left']=quangcao_getByTop('','TrangThai=1','Id asc');
    $data['danhmuc_subport']=danhmuc_subport_getByTop('','','id desc');
    $data['news_list']=news_getByTop(4,'','id desc');
    view_left($data);
}

function  show_left2($data1=array())
{
    $data=array();

    $data['danhmuc1']=$data1['danhmuc1'];
    $data['doitac']=$data1['doitac'];
    $data['sanpham_left']=$data1['sanpham_left'];
    $data['tag']=$data1['tag'];
    view_left2($data);
}
function  show_right($data1=array())
{
    $data=array();
    $data['tintuc_right']=news_getByTop('10','','id desc');
    $data['video_right']=video_getByTop('7','','id desc');
    $data['hotro_right']=subport_getByTop('','','id desc');
    $data['tag_right']=tag_getByTop('','','position asc');
    $data['price_right']=price_timkiem_getByTop('','','position asc');
    view_right($data);
}
function show_menu($data1=array(),$active='trangchu')
{
    $data=array();
    $data['config']=$data1['config'];
    $data['active']=$active;
    $data['menu']=$data1['menu'];
    $data['danhmuc_menu']=danhmuc_1_getByTop('','id!=1','position asc');
    $data['danhmuc_khachsan']=danhmuc_khachsan_getByTop('','','position asc');
    $data['danhmuc_tintuc']=danhmuc_tintuc_getByTop('','','position asc');
    view_menu($data);
}

function show_banner($data1=array())
{
    $data=array();
    $data['banner']=$data1['banner'];
    view_banner($data);
}

function show_footer($data1=array())
{
    $data=array();
    $data['config']=$data1['config'];
    $data['mangxahoi']=social_getByTop(1,'','');
    $data['info']=info_mix_getByTop('','','id asc');
    $data['danhmuc_menu_footer']=danhmuc_1_getByTop('','id!=1','position asc');
    view_footer($data);
}
function  show_left_danhmuc($data1=array())
{
    $data=$data1;
    $data['tintuc_left']=news_getByTop('10','','id desc');
    $data['danhmuc_1_timkiem']=danhmuc_1_getByTop('','id!=1','position asc');
    $data['danhmuc_khachsan_timkiem']=danhmuc_khachsan_getByTop('','','position asc');
    $data['danhmuc_tintuc_timkiem']=danhmuc_tintuc_getByTop('','','position asc');
    $data['departure_timkiem']=departure_getByTop('','','position asc');
    $data['tag_left']=tag_getByTop('','','id desc');
    view_left_danhmuc($data);
}
