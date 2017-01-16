<?php
class config
{
    public $Id,$Logo,$Icon,$Name,$Address,$Phone,$fax,$Hotline,$Email,$Website,$Map,$Address_hcm,$Phone_hcm,$fax_hcm,$Hotline_hcm,$Email_hcm,$Map_hcm;
    public function config($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Logo=isset($data['Logo'])?$data['Logo']:'';
    $this->Icon=isset($data['Icon'])?$data['Icon']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Address=isset($data['Address'])?$data['Address']:'';
    $this->Phone=isset($data['Phone'])?$data['Phone']:'';
    $this->fax=isset($data['fax'])?$data['fax']:'';
    $this->Hotline=isset($data['Hotline'])?$data['Hotline']:'';
    $this->Email=isset($data['Email'])?$data['Email']:'';
    $this->Website=isset($data['Website'])?$data['Website']:'';
    $this->Map=isset($data['Map'])?$data['Map']:'';
    $this->Address_hcm=isset($data['Address_hcm'])?$data['Address_hcm']:'';
    $this->Phone_hcm=isset($data['Phone_hcm'])?$data['Phone_hcm']:'';
    $this->fax_hcm=isset($data['fax_hcm'])?$data['fax_hcm']:'';
    $this->Hotline_hcm=isset($data['Hotline_hcm'])?$data['Hotline_hcm']:'';
    $this->Email_hcm=isset($data['Email_hcm'])?$data['Email_hcm']:'';
    $this->Map_hcm=isset($data['Map_hcm'])?$data['Map_hcm']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Logo=addslashes($this->Logo);
            $this->Icon=addslashes($this->Icon);
            $this->Name=addslashes($this->Name);
            $this->Address=addslashes($this->Address);
            $this->Phone=addslashes($this->Phone);
            $this->fax=addslashes($this->fax);
            $this->Hotline=addslashes($this->Hotline);
            $this->Email=addslashes($this->Email);
            $this->Website=addslashes($this->Website);
//            $this->Map=addslashes($this->Map);
            $this->Address_hcm=addslashes($this->Address_hcm);
            $this->Phone_hcm=addslashes($this->Phone_hcm);
            $this->fax_hcm=addslashes($this->fax_hcm);
            $this->Hotline_hcm=addslashes($this->Hotline_hcm);
            $this->Email_hcm=addslashes($this->Email_hcm);
//            $this->Map_hcm=addslashes($this->Map_hcm);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Logo=stripslashes($this->Logo);
            $this->Icon=stripslashes($this->Icon);
            $this->Name=stripslashes($this->Name);
            $this->Address=stripslashes($this->Address);
            $this->Phone=stripslashes($this->Phone);
            $this->fax=stripslashes($this->fax);
            $this->Hotline=stripslashes($this->Hotline);
            $this->Email=stripslashes($this->Email);
            $this->Website=stripslashes($this->Website);
//            $this->Map=stripslashes($this->Map);
            $this->Address_hcm=stripslashes($this->Address_hcm);
            $this->Phone_hcm=stripslashes($this->Phone_hcm);
            $this->fax_hcm=stripslashes($this->fax_hcm);
            $this->Hotline_hcm=stripslashes($this->Hotline_hcm);
            $this->Email_hcm=stripslashes($this->Email_hcm);
//            $this->Map_hcm=stripslashes($this->Map_hcm);
        }
}
