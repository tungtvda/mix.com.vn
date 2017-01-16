<?php
require_once DIR . '/view/default/public.php';
function view_footer($data = array())
{
    $asign = array();
    $asign['Logo'] = $data['config'][0]->Logo;
    $asign['Name'] = $data['config'][0]->Name;

    $asign['Address'] = $data['config'][0]->Address;
    $asign['Phone'] = $data['config'][0]->Phone;
    $asign['Hotline'] = $data['config'][0]->Hotline;
    $asign['Email'] = $data['config'][0]->Email;
    $asign['Fax'] = $data['config'][0]->fax;

    $asign['Address_hcm'] = $data['config'][0]->Address_hcm;
    $asign['Phone_hcm'] = $data['config'][0]->Phone_hcm;
    $asign['Hotline_hcm'] = $data['config'][0]->Hotline_hcm;
    $asign['Fax_hcm'] = $data['config'][0]->fax_hcm;
    $asign['Email_hcm'] = $data['config'][0]->Email_hcm;

    $asign['twitter'] = $data['mangxahoi'][0]->twitter;
    $asign['youtube'] = $data['mangxahoi'][0]->youtube;
    $asign['facebook'] = $data['mangxahoi'][0]->facebook;
    $asign['google'] = $data['mangxahoi'][0]->google;
    $asign['rss'] = $data['mangxahoi'][0]->rss;

    $asign['quydinh'] = $data['info'][0]->name;
    $asign['baomat'] = $data['info'][1]->name;
    $asign['thanhtoan'] = $data['info'][2]->name;
    $asign['doitra'] = $data['info'][3]->name;
    $asign['khieunai'] = $data['info'][4]->name;
    $asign['giaonhan'] = $data['info'][5]->name;

    $asign['danhmuc_menu_footer'] ='';
    if(count($data['danhmuc_menu_footer'])>0){

        foreach($data['danhmuc_menu_footer'] as $row){
            $link_dm1=link_dm_tour1($row);
            $data_danhmuc2=danhmuc_2_getByTop('','id!=1 and danhmuc1_id='.$row->id,'position asc');
            if(count($data_danhmuc2)>0){
                $asign['danhmuc_menu_footer'] .=' <div class="Domestic"> <ul>';
                $asign['danhmuc_menu_footer'] .=' <li><a style="font-weight: bold" href="'.$link_dm1.'">'.$row->name.'</a></li>';
                foreach($data_danhmuc2 as $row2){
                    $link_dm2=link_dm_tour2($row2,$row->name_url);
                    $asign['danhmuc_menu_footer'] .=' <li><a href="'.$link_dm2.'">'.$row2->name.'</a></li>';
                }
                $asign['danhmuc_menu_footer'] .='</ul></div>';
            }

        }

    }

    print_template($asign, 'footer');
}
