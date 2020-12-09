<?php

namespace Otiumtek\StelOrderLaravel\Models;

class ProductImage {

    private $id;
    private $path;
    private $order;

    public static function make($data)
    {
        $instance = new self();
        $mapper = self::mapper();
        foreach($mapper as $key => $value){
            $instance->{$value}($data[$key]);
        }
        return $instance;
    }

    public static function mapper(){
        return [
            'item-image-id' => 'setId',
            'item-image-path' => 'setPath',
            'order' => 'setOrder',
        ];
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    

    /**
     * Get the value of path
     */ 
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @return  self
     */ 
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the value of order
     */ 
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @return  self
     */ 
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }
}