<?php

namespace Otiumtek\StelOrderLaravel\Models;

class DocumentItem {

    private $id;
    private $itemId;
    private $itemName;
    private $itemDescription;
    private $totalAmount;
    private $units;
    private $lineType;
    private $order;

    public static function make($data)
    {
        $instance = new self();
        $mapper = self::mapperBase();
        foreach($mapper as $key => $value){
            $instance->{$value}($data[$key]);
        }
        return $instance;
    }

    public static function mapperBase(){
        return [
            'id' => 'setId',
            'item-id' => 'setItemId',
            'item-name' => 'setItemName',
            'item-description' => 'setItemDescription',
            'total-amount' => 'setTotalAmount', 
            'units' => 'setUnits',
            'line-type' => 'setLineType',
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
     * Get the value of itemId
     */ 
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set the value of itemId
     *
     * @return  self
     */ 
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get the value of itemName
     */ 
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * Set the value of itemName
     *
     * @return  self
     */ 
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;

        return $this;
    }

    /**
     * Get the value of itemDescription
     */ 
    public function getItemDescription()
    {
        return $this->itemDescription;
    }

    /**
     * Set the value of itemDescription
     *
     * @return  self
     */ 
    public function setItemDescription($itemDescription)
    {
        $this->itemDescription = $itemDescription;

        return $this;
    }

    /**
     * Get the value of totalAmount
     */ 
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Set the value of totalAmount
     *
     * @return  self
     */ 
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * Get the value of units
     */ 
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set the value of units
     *
     * @return  self
     */ 
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get the value of lineType
     */ 
    public function getLineType()
    {
        return $this->lineType;
    }

    /**
     * Set the value of lineType
     *
     * @return  self
     */ 
    public function setLineType($lineType)
    {
        $this->lineType = $lineType;

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