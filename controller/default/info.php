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
require_once DIR . '/common/redict.php';
$data['menu']=menu_getByTop('','','');
$data['config']=config_getByTop(1,'','');
if(!isset($_GET['Id'])||$_GET['Id']==''){
    redict(SITE_NAME);
}
$function='';
$active='';
$id=addslashes(strip_tags($_GET['Id']));
if($id=='lien-he'){
    $name=$data['menu'][4]->name;
    $data['banner']=array(
        'banner_img'=>$data['menu'][4]->img,
        'name'=>$name,
        'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
    );
    $data['link_anh']=$data['menu'][4]->img;

    $title=$data['menu'][4]->title;
    $description=$data['menu'][4]->description;
    $keyword=$data['menu'][4]->keyword;
    $active='lienhe';
    $function='show_lienhe';
}
else{
    $data['detail']=info_mix_getByTop('1','name_url="'.$id.'"','id desc');
    if(count($data['detail'])==0){
        redict(SITE_NAME);
    }
    $name=$data['detail'][0]->name;
    $data['banner']=array(
        'banner_img'=>$data['detail'][0]->img,
        'name'=>$name,
        'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
    );
    $data['link_anh']=$data['detail'][0]->img;
    $data['link_url']=SITE_NAME.'/'.$id.'.html';
    $title=$data['detail'][0]->title;
    $description=$data['detail'][0]->description;
    $keyword=$data['detail'][0]->keyword;
    $active='';
    $function='show_info';
}

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
show_menu($data,$active);
show_banner($data);
$function($data);
show_left_danhmuc($data);
show_footer($data);
contact();