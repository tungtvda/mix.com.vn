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
$data['detail']=tour_getByTop('1','name_url="'.$id.'"','');
if(count($data['detail'])==0){
    redict(SITE_NAME);
}
$url='';
$banner='';
$link_detail='';
if(isset($_GET['Id_sub'])&&$_GET['Id_sub']!=''){
    if(isset($_GET['Id'])&&$_GET['Id']!=''){
        $id=addslashes(strip_tags($_GET['Id']));
    }
    else{
        redict(SITE_NAME);
    }
    $danhmuc2=danhmuc_2_getById($data['detail'][0]->DanhMuc2Id);
    if(count($danhmuc2)>0) {
        $danhmuc_1 = danhmuc_1_getById($data['detail'][0]->DanhMuc1Id);
        if(count($danhmuc_1)>0)
        {
            $url='<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><a href="'.SITE_NAME.'/tour/">'.$data['menu'][1]->name.'</a></li><li><a href="'.SITE_NAME.'/tour/'.$danhmuc_1[0]->name_url.'/">'.$danhmuc_1[0]->name.'</a></li><li><a href="'.SITE_NAME.'/tour/'.$danhmuc_1[0]->name_url.'/'.$danhmuc2[0]->name_url.'">'.$danhmuc2[0]->name.'</a></li><li><span>'.$data['detail'][0]->name.'</span></li>';
            $banner=$danhmuc2[0]->img;
            $link_detail=link_tourdetail($data['detail'][0],$danhmuc_1[0]->name_url,$danhmuc2[0]->name_url);
        }
        else{
            redict(SITE_NAME);
        }
    }
    else{
        redict(SITE_NAME);
    }

}
else{
    $danhmuc_1 = danhmuc_1_getById($data['detail'][0]->DanhMuc1Id);
    if(count($danhmuc_1)>0)
    {
        $url='<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><a href="'.SITE_NAME.'/tour/">'.$data['menu'][1]->name.'</a></li><li><a href="'.SITE_NAME.'/tour/'.$danhmuc_1[0]->name_url.'/">'.$danhmuc_1[0]->name.'</a></li><li><span>'.$data['detail'][0]->name.'</span></li>';
        $banner=$danhmuc_1[0]->img;
        $link_detail=link_tourdetail($data['detail'][0],$danhmuc_1[0]->name_url,'');
    }
    else{
        redict(SITE_NAME);
    }
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
$data['tour_lienquan']=tour_getByTop(6,'id!='.$data['detail'][0]->id.' and DanhMuc1Id='.$data['detail'][0]->DanhMuc1Id,'id desc');

$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';
show_header($title,$description,$keywords,$data);
show_menu($data,'tour');
show_banner($data);
show_chitiet_tour($data);
show_footer($data);
