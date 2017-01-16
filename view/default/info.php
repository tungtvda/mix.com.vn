<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_info($data = array())
{
    $asign = array();
    $asign['img']= $data['detail'][0]->img;
    $asign['content']= $data['detail'][0]->content;
    $asign['name']= $data['detail'][0]->name;
    $asign['link']=$data['link_url'];
    $asign['name_url']=$data['detail'][0]->name_url;
    $asign['id']= $data['detail'][0]->id;
    $content=$data['detail'][0]->content;
    if (strlen($content) > 200) {
        $ten1=strip_tags($content);

        $ten = substr($ten1, 0, 200);
        $asign['content_short'] = substr($ten, 0, strrpos($ten, ' ')) . "...";
    } else {
        $asign['content_short']=strip_tags($content);
    }
    print_template($asign, 'chitietinfo');
}



