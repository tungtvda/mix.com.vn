<?php
/**
 * Created by PhpStorm.
 * User: ductho
 * Date: 8/15/14
 * Time: 3:43 PM
 */
require_once DIR.'/view/default/public.php';
function view_banner($data=array())
{
    $asign=array();
    $asign['name_dm']=$data['banner']['name'];
    $asign['banner_img']=$data['banner']['banner_img'];
    $asign['url']=$data['banner']['url'];
    $asign['content_short']='';
    if(isset($data['banner']['content_short'])){
        $asign['content_short']=$data['banner']['content_short'];
    }
    print_template($asign,'banner');
}
