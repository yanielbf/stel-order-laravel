<?php

namespace Otiumtek\StelOrderLaravel\Models;

class CustomerAddress {

    private $id;
    private $addressData;
    private $cityTown;
    private $province;

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
            'province' => 'setProvince',
            'city-town' => 'setCityTown',
            'address-data' => 'setAddressData',
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
     * Get the value of addressData
     */ 
    public function getAddressData()
    {
        return $this->addressData;
    }

    /**
     * Set the value of addressData
     *
     * @return  self
     */ 
    public function setAddressData($addressData)
    {
        $this->addressData = $addressData;

        return $this;
    }

    /**
     * Get the value of cityTown
     */ 
    public function getCityTown()
    {
        return $this->cityTown;
    }

    /**
     * Set the value of cityTown
     *
     * @return  self
     */ 
    public function setCityTown($cityTown)
    {
        $this->cityTown = $cityTown;

        return $this;
    }

    /**
     * Get the value of province
     */ 
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set the value of province
     *
     * @return  self
     */ 
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }



    public function __toString()
    {
        return $this->getAddressData().', '.$this->getCityTown().', '.$this->getProvince();
    }
}