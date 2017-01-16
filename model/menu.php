<?php
class menu
{
    public $id,$img,$name,$title,$keyword,$description;
    public function menu($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->title=isset($data['title'])?$data['title']:'';
    $this->keyword=isset($data['keyword'])?$data['keyword']:'';
    $this->description=isset($data['description'])?$data['description']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->img=addslashes($this->img);
            $this->name=addslashes($this->name);
            $this->title=addslashes($this->title);
            $this->keyword=addslashes($this->keyword);
            $this->description=addslashes($this->description);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->img=stripslashes($this->img);
            $this->name=stripslashes($this->name);
            $this->title=stripslashes($this->title);
            $this->keyword=stripslashes($this->keyword);
            $this->description=stripslashes($this->description);
        }
}
