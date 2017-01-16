<?php
class video
{
    public $id,$name,$link_video,$highlights;
    public function video($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->link_video=isset($data['link_video'])?$data['link_video']:'';
    $this->highlights=isset($data['highlights'])?$data['highlights']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->name=addslashes($this->name);
            $this->link_video=addslashes($this->link_video);
            $this->highlights=addslashes($this->highlights);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->name=stripslashes($this->name);
            $this->link_video=stripslashes($this->link_video);
            $this->highlights=stripslashes($this->highlights);
        }
}
