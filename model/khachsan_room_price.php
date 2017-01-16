<?php
class khachsan_room_price
{
    public $id,$danhmuc_id,$name,$img,$description,$dichvu,$price,$amount_people,$amount_room;
    public function khachsan_room_price($data=array())
    {
    $this->id=isset($data['id'])?$data['id']:'';
    $this->danhmuc_id=isset($data['danhmuc_id'])?$data['danhmuc_id']:'';
    $this->name=isset($data['name'])?$data['name']:'';
    $this->img=isset($data['img'])?$data['img']:'';
    $this->description=isset($data['description'])?$data['description']:'';
    $this->dichvu=isset($data['dichvu'])?$data['dichvu']:'';
    $this->price=isset($data['price'])?$data['price']:'';
    $this->amount_people=isset($data['amount_people'])?$data['amount_people']:'';
    $this->amount_room=isset($data['amount_room'])?$data['amount_room']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->id=addslashes($this->id);
            $this->danhmuc_id=addslashes($this->danhmuc_id);
            $this->name=addslashes($this->name);
            $this->img=addslashes($this->img);
            $this->description=addslashes($this->description);
            $this->dichvu=addslashes($this->dichvu);
            $this->price=addslashes($this->price);
            $this->amount_people=addslashes($this->amount_people);
            $this->amount_room=addslashes($this->amount_room);
        }
    public function decode()
        {
            $this->id=stripslashes($this->id);
            $this->danhmuc_id=stripslashes($this->danhmuc_id);
            $this->name=stripslashes($this->name);
            $this->img=stripslashes($this->img);
            $this->description=stripslashes($this->description);
            $this->dichvu=stripslashes($this->dichvu);
            $this->price=stripslashes($this->price);
            $this->amount_people=stripslashes($this->amount_people);
            $this->amount_room=stripslashes($this->amount_room);
        }
}
