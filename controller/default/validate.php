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
$data['data']=tour_getByTop('','','');
foreach ($data['data'] as $row){
    $new =new tour((array)$row);
    tour_update($new);
}
print_r($data['data']);
