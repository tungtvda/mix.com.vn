<?php

class khachsan
{
    public $id, $danhmuc_id, $highlights, $name, $name_url, $start, $price, $dichvu, $img, $address, $phone, $email, $map, $content, $title, $keyword, $description;

    public function khachsan($data = array())
    {
        $this->id = isset($data['id']) ? $data['id'] : '';
        $this->danhmuc_id = isset($data['danhmuc_id']) ? $data['danhmuc_id'] : '';
        $this->highlights = isset($data['highlights']) ? $data['highlights'] : '';
        $this->name = isset($data['name']) ? $data['name'] : '';
        $this->name_url = isset($data['name_url']) ? $data['name_url'] : '';
        $this->start = isset($data['start']) ? $data['start'] : '';
        $this->price = isset($data['price']) ? $data['price'] : '';
        $this->dichvu = isset($data['dichvu']) ? $data['dichvu'] : '';
        $this->img = isset($data['img']) ? $data['img'] : '';
        $this->address = isset($data['address']) ? $data['address'] : '';
        $this->phone = isset($data['phone']) ? $data['phone'] : '';
        $this->email = isset($data['email']) ? $data['email'] : '';
        $this->map = isset($data['map']) ? $data['map'] : '';
        $this->content = isset($data['content']) ? $data['content'] : '';
        $this->title = isset($data['title']) ? $data['title'] : '';
        $this->keyword = isset($data['keyword']) ? $data['keyword'] : '';
        $this->description = isset($data['description']) ? $data['description'] : '';
        $this->encode();
    }

    public function encode()
    {
        $this->id = addslashes($this->id);
        $this->danhmuc_id = addslashes($this->danhmuc_id);
        $this->highlights = addslashes($this->highlights);
        $this->name = addslashes($this->name);
        $this->name_url = addslashes($this->name_url);
        $this->start = addslashes($this->start);
        $this->price = addslashes($this->price);
        $this->dichvu = addslashes($this->dichvu);
        $this->img = addslashes($this->img);
        $this->address = addslashes($this->address);
        $this->phone = addslashes($this->phone);
        $this->email = addslashes($this->email);
//            $this->map=addslashes($this->map);
        $this->content = addslashes($this->content);
        $this->title = addslashes($this->title);
        $this->keyword = addslashes($this->keyword);
        $this->description = addslashes($this->description);
    }

    public function decode()
    {
        $this->id = stripslashes($this->id);
        $this->danhmuc_id = stripslashes($this->danhmuc_id);
        $this->highlights = stripslashes($this->highlights);
        $this->name = stripslashes($this->name);
        $this->name_url = stripslashes($this->name_url);
        $this->start = stripslashes($this->start);
        $this->price = stripslashes($this->price);
        $this->dichvu = stripslashes($this->dichvu);
        $this->img = stripslashes($this->img);
        $this->address = stripslashes($this->address);
        $this->phone = stripslashes($this->phone);
        $this->email = stripslashes($this->email);
//            $this->map=stripslashes($this->map);
        $this->content = stripslashes($this->content);
        $this->title = stripslashes($this->title);
        $this->keyword = stripslashes($this->keyword);
        $this->description = stripslashes($this->description);
    }
}
