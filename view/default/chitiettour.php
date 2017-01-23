<?php
/**
 * Created by PhpStorm.
 * User: tungtv
 * Date: 11/10/14
 * Time: 2:44 PM
 */
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/cls_fast_template.php';
function show_chitiet_tour($data = array())
{
    $asign = array();
    $asign['name']= $data['detail'][0]->name;
    $asign['code']= $data['detail'][0]->code;
    $asign['img']= $data['detail'][0]->img;
    $asign['durations']= $data['detail'][0]->durations;
    $asign['destination']=$data['detail'][0]->destination;
    $asign['start']=sao($data['detail'][0]->hotel);
    $asign['name_url']=$data['detail'][0]->name_url;
    $asign['id']= $data['detail'][0]->id;

    $content=$data['detail'][0]->summary;
    if (strlen($content) > 200) {
        $ten1=strip_tags($content);

        $ten = substr($ten1, 0, 200);
        $asign['content_short'] = substr($ten, 0, strrpos($ten, ' ')) . "...";
    } else {
        $asign['content_short']=strip_tags($content);
    }
    $asign['summary']=$data['detail'][0]->summary;
    $asign['hidden_summary']='';
    if($data['detail'][0]->summary==''){
        $asign['hidden_summary']='hidden';
    }
    $asign['highlights']=$data['detail'][0]->highlights;
    $asign['hidden_summary']='';
    if($data['detail'][0]->summary==''){
        $asign['hidden_summary']='hidden';
    }
    $asign['price']= $data['detail'][0]->price;
    $asign['price_2']= $data['detail'][0]->price_2;
    $asign['price_3']= $data['detail'][0]->price_3;
    $asign['price_4']= $data['detail'][0]->price_4;
    $asign['price_5']= $data['detail'][0]->price_5;
    $asign['price_6']= $data['detail'][0]->price_6;
    $asign['link']=$data['link_url'];


    if($data['detail'][0]->price==0||$data['detail'][0]->price==''){
        $asign['price_format']='Liên hệ';
        $asign['vnd']='';
    }
    else{
        $asign['price_format']= number_format($data['detail'][0]->price,0,",",".");
        $asign['vnd']='vnđ';
    }
    $asign['price_2_format']= number_format($data['detail'][0]->price_2,0,",",".");
    $asign['price_3_format']= number_format($data['detail'][0]->price_3,0,",",".");
    $asign['price_4_format']= number_format($data['detail'][0]->price_4,0,",",".");
    $asign['price_5_format']= number_format($data['detail'][0]->price_5,0,",",".");
    $asign['price_6_format']= number_format($data['detail'][0]->price_6,0,",",".");
    $asign['date_now'] = date('Y-m-d', strtotime(date(DATETIME_FORMAT)));
    $asign['date_now_vn'] = date('d-m-Y', strtotime(date(DATETIME_FORMAT)));

    $asign['schedule']=$data['detail'][0]->schedule;

    $asign['inclusion']=$data['detail'][0]->inclusion;
    $asign['hidden_inclusion']='';
    if($data['detail'][0]->inclusion==''){
        $asign['hidden_inclusion']='hidden';
    }
    $asign['exclusion']=$data['detail'][0]->exclusion;
    $asign['hidden_exclusion']='';
    if($data['detail'][0]->exclusion==''){
        $asign['hidden_exclusion']='hidden';
    }

    $asign['price_list']=$data['detail'][0]->price_list;
    $asign['vehicle']=$data['detail'][0]->vehicle;

    $asign['tour_lienquan'] ='';
    if(count($data['tour_lienquan'])>0) {
        $asign['tour_lienquan'] = print_item('lienquan', $data['tour_lienquan']);
    }

    $asign['Hotline'] = $data['config'][0]->Hotline;
    $asign['Hotline_hcm'] = $data['config'][0]->Hotline_hcm;

    $asign['departure_time']=$data['detail'][0]->departure_time;
    $asign['hidden_date']='';
    $asign['hidden_date_select']='hidden';
    $asign['date_select']='';
    if($data['detail'][0]->departure_time!=''){
        $asign['hidden_date']='hidden';
        $arr_explode=explode(',',$data['detail'][0]->departure_time);
        if(count($arr_explode)>0){

            $asign['date_now']=date('Y-m-d', strtotime(trim($arr_explode[0])));
            $asign['date_now_vn'] =trim($arr_explode[0]);
            $asign['hidden_date_select']='';
            foreach($arr_explode as $row){
                $date=trim($row);
                if(validateDate($date)==false){
                    $asign['hidden_date']='';
                    $asign['hidden_date_select']='hidden';
                    break;
                }
                $date_en=date('Y-m-d', strtotime(trim($row)));
                $asign['date_select'].='<option value="'.$date_en.'">'.$date.'</option>';
            }
        }
    }

    $asign['quocgia']='';
    $arr=explode(',',trim($data['detail'][0]->danhmuc_multi));
    if(count($arr)>0){
        $asign['quocgia'].='<div class="package-details-choose">
                            <h3 class="title">Quốc gia</h3>
                            <ul class="clearfix">';

        foreach($arr as $val){
            $data_danhmuc=danhmuc_2_getById($val);
            if(count($data_danhmuc)>0){
                $data_danhmuc_1=danhmuc_1_getById($data_danhmuc[0]->danhmuc1_id);

                if(count($data_danhmuc_1)>0){

                    $asign['quocgia'].='<li><span><a href="'.link_dm_tour2($data_danhmuc[0], $data_danhmuc_1[0]->name_url,$data_danhmuc_1[0]->tour_quoc_te).'"><i class="fa fa-check"></i>'.$data_danhmuc[0]->name.' </span></a></li>';
                }

            }

        }
        $asign['quocgia'].=' </ul></div>';
    }

    print_template($asign, 'chitiettour');
}

function validateDate($date, $format = 'd-m-Y')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

