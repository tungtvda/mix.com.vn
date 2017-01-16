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

if(isset($_GET['Id_sub'])&&$_GET['Id_sub']!=''){
    if(isset($_GET['Id'])&&$_GET['Id']!=''){
        $id=addslashes(strip_tags($_GET['Id']));
    }
    else{
        redict(SITE_NAME);
    }
    $Id_sub=addslashes(strip_tags($_GET['Id_sub']));
    $danhmuc2=danhmuc_2_getByTop(1,'name_url="'.$Id_sub.'"','');
    if(count($danhmuc2)>0) {
        $danhmuc_1 = danhmuc_1_getByTop(1, 'id=' . $danhmuc2[0]->danhmuc1_id, '');
        if(count($danhmuc_1)>0)
        {
            $dk="DanhMuc2Id=".$danhmuc2[0]->id;
            $data['current']=isset($_GET['page'])?$_GET['page']:'1';;
            $data['pagesize']=9;
            $data['count']=tour_count($dk);
            $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
            $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/tour/'.$danhmuc_1[0]->name_url.'/'.$danhmuc2[0]->name_url.'/');
            $name=$danhmuc2[0]->name;
            $data['banner']=array(
                'banner_img'=>$danhmuc2[0]->img,
                'name'=>$name,
                'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><a href="'.SITE_NAME.'/tour/">'.$data['menu'][1]->name.'</a></li><li><a href="'.SITE_NAME.'/tour/'.$danhmuc_1[0]->name_url.'/">'.$danhmuc_1[0]->name.'</a></li><li><span>'.$name.'</span></li>'
            );
            $data['link_anh']=$danhmuc2[0]->img;
            $title=$danhmuc2[0]->title;
            $description=$danhmuc2[0]->description;
            $keyword=$danhmuc2[0]->keyword;
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
    if(isset($_GET['Id'])&&$_GET['Id']!=''){
        $id=addslashes(strip_tags($_GET['Id']));
        $danhmuc=danhmuc_1_getByTop(1,'name_url="'.$id.'"','');
        if(count($danhmuc)==0){
            redict(SITE_NAME);
        }
        $dk='DanhMuc1Id='.$danhmuc[0]->id;

        $data['current']=isset($_GET['page'])?$_GET['page']:'1';;
        $data['pagesize']=9;
        $data['count']=tour_count($dk);
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc',$dk);
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/tour/'.$danhmuc[0]->name_url.'/');
        $name=$danhmuc[0]->name;
        $data['banner']=array(
            'banner_img'=>$danhmuc[0]->img,
            'name'=>$name,
            'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><a href="'.SITE_NAME.'/tour/">'.$data['menu'][1]->name.'</a></li><li><span>'.$name.'</span></li>'
        );
        $data['link_anh']=$danhmuc[0]->img;
        $title=$danhmuc[0]->title;
        $description=$danhmuc[0]->description;
        $keyword=$danhmuc[0]->keyword;
    }
    else{
        $data['current']=isset($_GET['page'])?$_GET['page']:'1';;
        $data['pagesize']=9;
        $data['count']=tour_count('');
        $data['danhsach']=tour_getByPaging($data['current'],$data['pagesize'],'id desc','');
        $data['PAGING'] = showPagingAtLink($data['count'], $data['pagesize'], $data['current'], '' . SITE_NAME . '/tour/');
        $name=$data['menu'][1]->name;
        $data['banner']=array(
            'banner_img'=>$data['menu'][1]->img,
            'name'=>$name,
            'url'=>'<li><a href="'.SITE_NAME.'">Trang chủ</a></li><li><span>'.$name.'</span></li>'
        );
        $data['link_anh']=$data['menu'][1]->img;
        $title=$data['menu'][1]->title;
        $description=$data['menu'][1]->description;
        $keyword=$data['menu'][1]->keyword;
    }
}
$data['tab_tour_title']='active_tab_left';
$data['tab_khachsan_title']='';
$data['tab_tintuc_title']='';

$data['tab_tour']='';
$data['tab_khachsan']='hidden';
$data['tab_tintuc']='hidden';
$date_now=_returnGetDateTime();
$data['tour_count_down']=tour_getByTop(9,'count_down!="" and count_down>"'.$date_now.'"','id desc');
$data['tour_PROMOTIONS']=tour_getByTop(9,'promotion=1 ','id desc');
$data['tour_sales']=tour_getByTop(9,'price_sales!="" ','id desc');

$title=($title)?$title:'Azbooking.vn';
$description=($description)?$description:'Azbooking.vn';
$keywords=($keyword)?$keyword:'Azbooking.vn';
show_header($title,$description,$keywords,$data);
show_menu($data,'tour');
show_banner($data);
show_danhmuc_tour($data);
show_left_danhmuc($data);
show_footer($data);
