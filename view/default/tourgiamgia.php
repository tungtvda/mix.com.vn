<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_tourgiamgia($data = array())
{
    $asign = array();
    $asign['danhsach'] ='';

    $asign['PAGING']=$data['PAGING'];

    $asign['tour_count_down'] ='';
    $asign['tour_count_down_js'] ='';
    if(count($data['danhsach'])>0)
    {
        $asign['tour_count_down'] = print_item('tour_index', $data['danhsach']);
    }

    print_template($asign, 'tourgiochot');
}



