<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_danhmuc_tour($data = array())
{
    $asign = array();
    $asign['danhsach'] ='';
    if(count($data['danhsach'])>0)
    {
        $asign['danhsach'] = print_item('tour_index', $data['danhsach']);
    }
    else{
        $asign['danhsach'] ='<div class="item_tour col-xs-12 col-sm-6 col-md-4">Hệ thống đang cập nhật dữ liệu</div>';
    }
    $asign['PAGING']=$data['PAGING'];

    $asign['tour_count_down'] ='';
    $asign['tour_count_down_js'] ='';
    if(count($data['tour_count_down'])>0)
    {
        $asign['tour_count_down'] = print_item('tour_count_down_danhmuc', $data['tour_count_down']);
        $asign['tour_count_down_js'] = print_item('tour_count_down_js', $data['tour_count_down']);
    }

    $asign['tour_PROMOTIONS'] ='';
    if(count($data['tour_PROMOTIONS'])>0)
    {
        $asign['tour_PROMOTIONS'] = print_item('tour_index', $data['tour_PROMOTIONS']);
    }

    $asign['tour_sales'] ='';
    if(count($data['tour_sales'])>0)
    {
        $asign['tour_sales'] = print_item('tour_index', $data['tour_sales']);
    }
    print_template($asign, 'danhmuc_tour');
}



