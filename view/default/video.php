<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_video($data = array())
{
    $asign = array();
    $asign['danhsach'] ='';
    $asign['PAGING']=$data['PAGING'];
    if(count($data['danhsach'])>0)
    {
        $asign['danhsach'] = print_item('video', $data['danhsach']);
    }

    print_template($asign, 'video');
}



