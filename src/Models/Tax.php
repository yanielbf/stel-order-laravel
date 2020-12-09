<?php

namespace Otiumtek\StelOrderLaravel\Models;

class Tax {

    private $id;
    private $default;
    private $taxPercentage;
    private $taxName;

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
            'id' => 'setId',
            'default' => 'setDefault',
            'tax-percentage' => 'setTaxPercentage',
            'tax-name' => 'setTagName',
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
     * Get the value of default
     */ 
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * Set the value of default
     *
     * @return  self
     */ 
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Get the value of taxPercentage
     */ 
    public function getTaxPercentage()
    {
        return $this->taxPercentage;
    }

    /**
     * Set the value of taxPercentage
     *
     * @return  self
     */ 
    public function setTaxPercentage($taxPercentage)
    {
        $this->taxPercentage = $taxPercentage;

        return $this;
    }

    /**
     * Get the value of taxName
     */ 
    public function getTaxName()
    {
        return $this->taxName;
    }

    /**
     * Set the value of taxName
     *
     * @return  self
     */ 
    public function setTaxName($taxName)
    {
        $this->taxName = $taxName;

        return $this;
    }
}