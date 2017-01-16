<?php
require_once 'config.php';
require_once DIR . '/common/redict.php';
$actual_link = 'http://'.$_SERVER['HTTP_HOST'];
$string_check=strstr($actual_link,"www");
if($string_check!=''){
    redict(SITE_NAME);
}
require_once DIR.'/controller/default/index.php';