<?php
require_once DIR.'/model/config.php';
require_once DIR.'/model/sqlconnection.php';
//
function config_Get($command)
{
            $array_result=array();
    $key=md5($command);
    if(CACHE)
    {
        $mycache=ConnectCache();
        $cachecommand=$mycache->get($key);
        if($cachecommand)
        {
            $array_result=$cachecommand;
        }
        else
        {
          $result=mysqli_query(ConnectSql(),$command);
            if($result!=false)while($row=mysqli_fetch_array($result))
            {
                $new_obj=new config($row);
                $new_obj->decode();
                array_push($array_result,$new_obj);
            }
            $mycache->set($key,$array_result);
            saveCacheGroup($mycache,$key,'config');
        }
    }
    else
    {
       $result=mysqli_query(ConnectSql(),$command);
       if($result!=false)while($row=mysqli_fetch_array($result))
        {
            $new_obj=new config($row);
            $new_obj->decode();
            array_push($array_result,$new_obj);
        }
    }
    return $array_result;
}
//
function config_getById($Id)
{
    return config_Get('select * from config where Id='.$Id);
}
//
function config_getByAll()
{
    return config_Get('select * from config');
}
//
function config_getByTop($top,$where,$order)
{
    return config_Get("select * from config ".(($where!='')?(' where '.$where):'').(($order!='')?" Order By ".$order:'').(($top!='')?' limit '.$top:''));
}
//
function config_getByPaging($CurrentPage, $PageSize,$Order,$where)
{
   return config_Get("SELECT * FROM  config ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function config_getByPagingReplace($CurrentPage, $PageSize,$Order,$where)
{
   return config_Get("SELECT config.Id, config.Logo, config.Icon, config.Name, config.Address, config.Phone, config.fax, config.Hotline, config.Email, config.Website, config.Map, config.Address_hcm, config.Phone_hcm, config.fax_hcm, config.Hotline_hcm, config.Email_hcm, config.Map_hcm FROM  config ".(($where!='')?(' where '.$where):'')." Order By ".$Order." Limit ".(($CurrentPage-1)*$PageSize)." , ".$PageSize);
}
//
function config_insert($obj)
{
    return exe_query("insert into config (Logo,Icon,Name,Address,Phone,fax,Hotline,Email,Website,Map,Address_hcm,Phone_hcm,fax_hcm,Hotline_hcm,Email_hcm,Map_hcm) values ('$obj->Logo','$obj->Icon','$obj->Name','$obj->Address','$obj->Phone','$obj->fax','$obj->Hotline','$obj->Email','$obj->Website','$obj->Map','$obj->Address_hcm','$obj->Phone_hcm','$obj->fax_hcm','$obj->Hotline_hcm','$obj->Email_hcm','$obj->Map_hcm')",'config');
}
//
function config_update($obj)
{
    return exe_query("update config set Logo='$obj->Logo',Icon='$obj->Icon',Name='$obj->Name',Address='$obj->Address',Phone='$obj->Phone',fax='$obj->fax',Hotline='$obj->Hotline',Email='$obj->Email',Website='$obj->Website',Map='$obj->Map',Address_hcm='$obj->Address_hcm',Phone_hcm='$obj->Phone_hcm',fax_hcm='$obj->fax_hcm',Hotline_hcm='$obj->Hotline_hcm',Email_hcm='$obj->Email_hcm',Map_hcm='$obj->Map_hcm' where Id=$obj->Id",'config');
}
//
function config_delete($obj)
{
    return exe_query('delete from config where Id='.$obj->Id,'config');
}
//
function config_count($where)
{
    $result=mysqli_query(ConnectSql(),'select COUNT(Id) as count from config '.(($where!='')?'where '.$where:''));
    if($result!=false)
    {
         $row=mysqli_fetch_array($result);
         return $row['count'];
    }
   else return false;
}
