<?php
require_once DIR . '/view/default/public.php';
require_once DIR . '/common/locdautiengviet.php';

function view_menu($data = array())
{
    $asign = array();
    $asign['email']=$data['config'][0]->Email;
    $asign['Logo']=$data['config'][0]->Logo;
    $asign['Name']=$data['config'][0]->Name;
    $asign['Hotline']=$data['config'][0]->Hotline;

    $asign['trangchu']=$data['menu'][0]->name;
    $asign['tour']=$data['menu'][1]->name;
    $asign['khachsan']=$data['menu'][2]->name;
    $asign['tintuc']=$data['menu'][3]->name;
    $asign['lienhe']=$data['menu'][4]->name;


    // active menu
    $asign['trangchu_mn'] = ($data['active'] == 'trangchu') ? 'current-menu-parent' : '';
    $asign['tour_mn'] = ($data['active'] == 'tour') ? 'current-menu-parent' : '';
    $asign['khachsan_mn'] = ($data['active'] == 'khachsan') ? 'current-menu-parent' : '';
    $asign['tintuc_mn'] = ($data['active'] == 'tintuc') ? 'current-menu-parent' : '';
    $asign['lienhe_mn'] = ($data['active'] == 'lienhe') ? 'current-menu-parent' : '';

    $asign['danhmuc_menu'] ='';
    if(count($data['danhmuc_menu'])>0){
        $asign['danhmuc_menu'] .='<ul class="sub-menu">';
        foreach($data['danhmuc_menu'] as $row){
            $link_dm1=link_dm_tour1($row);
            $asign['danhmuc_menu'] .='<li class="menu-item-has-children"><a href="'.$link_dm1.'">'.$row->name.'</a>';
                $data_danhmuc2=danhmuc_2_getByTop('','id!=1 and danhmuc1_id='.$row->id,'position asc');
                if(count($data_danhmuc2)>0){
                    $asign['danhmuc_menu'] .='<ul class="sub-menu">';
                    foreach($data_danhmuc2 as $row2){
                        $link_dm2=link_dm_tour2($row2,$row->name_url);
                        $asign['danhmuc_menu'] .='<li><a href="'.$link_dm2.'">'.$row2->name.'</a></li>';
                    }
                    $asign['danhmuc_menu'] .='</ul>';
                }
            $asign['danhmuc_menu'] .='</li>';
        }
        $asign['danhmuc_menu'] .='</ul>';
    }

    $asign['danhmuc_khachsan'] ='';
    if(count($data['danhmuc_khachsan'])>0)
    {
        $asign['danhmuc_khachsan'] = print_item('menu_item', $data['danhmuc_khachsan']);
    }
    $asign['danhmuc_tintuc'] ='';
    if(count($data['danhmuc_tintuc'])>0)
    {
        $asign['danhmuc_tintuc'] = print_item('menu_item', $data['danhmuc_tintuc']);
    }
    print_template($asign, 'menu');
}
