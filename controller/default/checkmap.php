<?php


if(!defined('DIR')) require_once '../../config.php';
require_once DIR.'/model/khachsanService.php';

if (isset($_POST['id']))
{
    $string='';
    $Id = addslashes(strip_tags($_POST['id']));
    $data =khachsan_getById($Id);
    if(count($data)>0){
        $string=' <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xem bản đồ khách sạn '.$data[0]->name.'</h4>
                        </div>

                        <div class="modal-body">
                            <p class="map_name">'.$data[0]->address.'</p>
                           <div class="body_map">
                             '.$data[0]->map.'
                           </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>';
    }else{
        $string= 'Hệ thống đang cập nhật dữ liệu';
    }
    echo $string;

}