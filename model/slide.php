<?php
class slide
{
    public $id,$name,$contents_short,$img,$img_small,$link,$position;
    public function slide($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->contents_short=isset($data['contents_short'])?$data['contents_short']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->img_small=isset($data['img_small'])?$data['img_small']:'';
    $this->link=isset($data['link'])?$data['link']:'';
    $this->position=isset($data['position'])?$data['position']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->name=addslashes($this->name);
            $this->contents_short=addslashes($this->contents_short);
            $this->img=addslashes($this->img);
            $this->img_small=addslashes($this->img_small);
            $this->link=addslashes($this->link);
            $this->position=addslashes($this->position);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->name=stripslashes($this->name);
            $this->contents_short=stripslashes($this->contents_short);
            $this->img=stripslashes($this->img);
            $this->img_small=stripslashes($this->img_small);
            $this->link=stripslashes($this->link);
            $this->position=stripslashes($this->position);
        }
}
