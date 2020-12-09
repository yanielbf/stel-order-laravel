<?php

namespace Otiumtek\StelOrderLaravel\Models;

class Product {

    private $id;
    private $name;
    private $promotional;
    private $description;
    private $reference;
    private $inactive;
    private $salesPrice;
    private $realStock;
    private $stockEnabled;
    private $itemImages;
    private $discountPercentage;
    private $primaryTaxPercentage;
    private $primaryTaxId;

    public static function make($data)
    {
        $instance = new self();
        $mapper = self::mapper();
        $mapperComplex = self::mapperComplex();
        foreach($mapper as $key => $value){
            $instance->{$value}($data[$key]);
        }
        foreach($mapperComplex as $key => $value){
            $complexData = collect($data[$key])->map(function($item) use ($value){
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
            'description' => 'setDescription',
            'reference' => 'setReference',
            'inactive' => 'setInactive', 
            'sales-price' => 'setSalesPrice', 
            'real-stock' => 'setRealStock',
            'stock-enabled' => 'setStockEnabled',
            'promotional' => 'setPromotional',
            'discount-percentage' => 'setDiscountPercentage',
            'primary-tax-id' => 'setPrimaryTaxId',
            'primary-tax-percentage' => 'setPrimaryTaxPercentage',
        ];
    }

    public static function mapperComplex(){
        return [
            'item-images' => ['setItemImages', 'Otiumtek\StelOrderLaravel\Models\ProductImage'],
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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of reference
     */ 
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */ 
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get the value of inactive
     */ 
    public function getInactive()
    {
        return $this->inactive;
    }

    /**
     * Set the value of inactive
     *
     * @return  self
     */ 
    public function setInactive($inactive)
    {
        $this->inactive = $inactive;

        return $this;
    }

    /**
     * Get the value of salesPrice
     */ 
    public function getSalesPrice()
    {
        return $this->salesPrice;
    }

    /**
     * Set the value of salesPrice
     *
     * @return  self
     */ 
    public function setSalesPrice($salesPrice)
    {
        $this->salesPrice = $salesPrice;

        return $this;
    }

    /**
     * Get the value of realStock
     */ 
    public function getRealStock()
    {
        return $this->realStock;
    }

    /**
     * Set the value of realStock
     *
     * @return  self
     */ 
    public function setRealStock($realStock)
    {
        $this->realStock = $realStock;

        return $this;
    }

    /**
     * Get the value of stockEnabled
     */ 
    public function getStockEnabled()
    {
        return $this->stockEnabled;
    }

    /**
     * Set the value of stockEnabled
     *
     * @return  self
     */ 
    public function setStockEnabled($stockEnabled)
    {
        $this->stockEnabled = $stockEnabled;

        return $this;
    }

    /**
     * Get the value of itemImages
     */ 
    public function getItemImages()
    {
        return $this->itemImages;
    }

    /**
     * Set the value of itemImages
     *
     * @return  self
     */ 
    public function setItemImages($itemImages)
    {
        $this->itemImages = $itemImages;

        return $this;
    }

    /**
     * Get the value of promotional
     */ 
    public function getPromotional()
    {
        return $this->promotional;
    }

    /**
     * Set the value of promotional
     *
     * @return  self
     */ 
    public function setPromotional($promotional)
    {
        $this->promotional = $promotional;

        return $this;
    }

    /**
     * Get the value of primaryTaxPercentage
     */ 
    public function getPrimaryTaxPercentage()
    {
        return $this->primaryTaxPercentage;
    }

    /**
     * Set the value of primaryTaxPercentage
     *
     * @return  self
     */ 
    public function setPrimaryTaxPercentage($primaryTaxPercentage)
    {
        $this->primaryTaxPercentage = $primaryTaxPercentage;

        return $this;
    }

    /**
     * Get the value of discountPercentage
     */ 
    public function getDiscountPercentage()
    {
        return $this->discountPercentage;
    }

    /**
     * Set the value of discountPercentage
     *
     * @return  self
     */ 
    public function setDiscountPercentage($discountPercentage)
    {
        $this->discountPercentage = $discountPercentage;

        return $this;
    }

    /**
     * Get the value of primaryTaxId
     */ 
    public function getPrimaryTaxId()
    {
        return $this->primaryTaxId;
    }

    /**
     * Set the value of primaryTaxId
     *
     * @return  self
     */ 
    public function setPrimaryTaxId($primaryTaxId)
    {
        $this->primaryTaxId = $primaryTaxId;

        return $this;
    }
}