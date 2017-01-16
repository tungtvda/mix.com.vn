<?php
class subport
{
    public $id,$name,$phone,$skype,$email,$yahoo;
    public function subport($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->phone=isset($data['phone'])?$data['phone']:'';
    $this->skype=isset($data['skype'])?$data['skype']:'';
    $this->email=isset($data['email'])?$data['email']:'';
    $this->yahoo=isset($data['yahoo'])?$data['yahoo']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->name=addslashes($this->name);
            $this->phone=addslashes($this->phone);
            $this->skype=addslashes($this->skype);
            $this->email=addslashes($this->email);
            $this->yahoo=addslashes($this->yahoo);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->name=stripslashes($this->name);
            $this->phone=stripslashes($this->phone);
            $this->skype=stripslashes($this->skype);
            $this->email=stripslashes($this->email);
            $this->yahoo=stripslashes($this->yahoo);
        }
}
