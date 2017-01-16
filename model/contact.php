<?php
class contact
{
    public $id,$name_kh,$address,$phone,$email,$title,$content,$created,$status;
    public function contact($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name_kh=isset($data['name_kh'])?$data['name_kh']:'';
    $this->address=isset($data['address'])?$data['address']:'';
    $this->phone=isset($data['phone'])?$data['phone']:'';
    $this->email=isset($data['email'])?$data['email']:'';
    $this->title=isset($data['title'])?$data['title']:'';
    $this->content=isset($data['content'])?$data['content']:'';
    $this->created=isset($data['created'])?$data['created']:'';
    $this->status=isset($data['status'])?$data['status']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->name_kh=addslashes($this->name_kh);
            $this->address=addslashes($this->address);
            $this->phone=addslashes($this->phone);
            $this->email=addslashes($this->email);
            $this->title=addslashes($this->title);
            $this->content=addslashes($this->content);
            $this->created=addslashes($this->created);
            $this->status=addslashes($this->status);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->name_kh=stripslashes($this->name_kh);
            $this->address=stripslashes($this->address);
            $this->phone=stripslashes($this->phone);
            $this->email=stripslashes($this->email);
            $this->title=stripslashes($this->title);
            $this->content=stripslashes($this->content);
            $this->created=stripslashes($this->created);
            $this->status=stripslashes($this->status);
        }
}
