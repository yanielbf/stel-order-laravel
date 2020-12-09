<?php

namespace Otiumtek\StelOrderLaravel\Models;

class Customer {

    private $id;
    private $legalName;
    private $name;
    private $email;
    private $mainAddress;

    public static function make($data)
    {
        $instance = new self();
        $mapper = self::mapper();
        $mapperComplex = self::mapperComplex();
        foreach($mapper as $key => $value){
            $instance->{$value}($data[$key]);
        }
        foreach($mapperComplex as $key => $value){
            $complexData = collect([$data[$key]])->map(function($item) use ($value){
                return $value[1]::make($item);
            });
            $instance->{$value[0]}($complexData);
        }
        return $instance;
    }

    public static function mapper(){
        return [
            'id' => 'setId',
            'name' => 'setName',
            'email' => 'setEmail',
            'legal-name' => 'setLegalName',
        ];
    }

    public static function mapperComplex(){
        return [
            'main-address' => ['setMainAddress', 'Otiumtek\StelOrderLaravel\Models\CustomerAddress'],
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mainAddress
     */ 
    public function getMainAddress()
    {
        return $this->mainAddress;
    }

    /**
     * Set the value of mainAddress
     *
     * @return  self
     */ 
    public function setMainAddress($mainAddress)
    {
        $this->mainAddress = $mainAddress;

        return $this;
    }

    /**
     * Get the value of legalName
     */ 
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * Set the value of legalName
     *
     * @return  self
     */ 
    public function setLegalName($legalName)
    {
        $this->legalName = $legalName;

        return $this;
    }
}