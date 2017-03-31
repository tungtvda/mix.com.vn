<?php
/**
 * Created by PhpStorm.
 * User: ductho
 * Date: 8/15/14
 * Time: 3:43 PM
 */
require_once DIR.'/view/default/public.php';
function view_header($data=array())
{
    $asign=array();
    $asign['Title']=$data['Title'];
    $asign['description']=strip_tags($data['Description']);
    $asign['keyword']=strip_tags($data['Keyword']);
    $asign['icon']=$data['config'][0]->Icon;
    $asign['link_anh']=SITE_NAME.$data['link_anh'];
    $asign['link_url']=SITE_NAME.$_SERVER["REQUEST_URI"];
    print_template($asign,'header');
}
