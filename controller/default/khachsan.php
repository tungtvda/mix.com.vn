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
    if(isset($_GET['Id'])&&$_GET['Id']!=''){
        $id=addslashes(strip_tags($_GET['Id']));
        $danhmuc=danhmuc_khachsan_getByTop(1,'name_url="'.$id.'"','');
        if(count($danhmuc)==0){
            redict(SITE_NAME);
        }
        $dk='danhmuc_id='.$danhmuc[0]->id;

        $data['current']=isset($_GET['page'])?$_GET['page']:'1';;
        $data['pagesize']=9;
        $data['count']=khachsan_count($dk);
        $data['danhsach']=khachsan_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/khach-san/'.$danhmuc[0]->name_url.'/');
        $name=$danhmuc[0]->name;
        $data['banner']=array(
            'banner_img'=>$danhmuc[0]->img,
            'name'=>$name,
            'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><a href="'.SITE_NAME.'/khach-san/">'.$data['menu'][2]->name.'</a></li><li><span>'.$name.'</span></li>'
        );
        $data['link_anh']=$danhmuc[0]->img;
        $title=$danhmuc[0]->title;
        $description=$danhmuc[0]->description;
        $keyword=$danhmuc[0]->keyword;
    }
    else{
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';;
        $data['pagesize']=9;
        $data['count']=khachsan_count('');
        $data['danhsach']=khachsan_getByPaging($data['current'],$data['pagesize'],'id desc','');
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/khach-san/');
        $name=$data['menu'][2]->name;
        $data['banner']=array(
            'banner_img'=>$data['menu'][2]->img,
            'name'=>$name,
            'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
        );
        $data['link_anh']=$data['menu'][2]->img;
        $title=$data['menu'][2]->title;
        $description=$data['menu'][2]->description;
        $keyword=$data['menu'][2]->keyword;
    }

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
show_khachsan($data);
show_left_danhmuc($data);
show_footer($data);
