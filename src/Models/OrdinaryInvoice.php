<?php

namespace Otiumtek\StelOrderLaravel\Models;

class OrdinaryInvoice extends Document {

    private $paidTotalAmount;
    private $remainingTotalAmount;

    public static function make($data)
    {
        $instance = new self();
        $mapperBase = self::mapperBase();
        $mapperComplex = self::mapperComplex();
        foreach($mapperBase as $key => $value){
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

    public static function mapperBase(){
        return [
            'id' => 'setId',
            'title' => 'setTitle',
            'date' => 'setDate',
            'total-amount' => 'setTotalAmount',
            'pdf-path' => 'setPdfPath', 
            'account-id' => 'setAccountId',
            'currency-code' => 'setCurrencyCode'
        ];
    }

    public static function mapperComplex(){
        return [
            'lines' => ['setLines', 'Otiumtek\StelOrderLaravel\Models\DocumentItem'],
        ];
    }

    /**
     * Get the value of paidTotalAmount
     */ 
    public function getPaidTotalAmount()
    {
        return $this->paidTotalAmount;
    }

    /**
     * Set the value of paidTotalAmount
     *
     * @return  self
     */ 
    public function setPaidTotalAmount($paidTotalAmount)
    {
        $this->paidTotalAmount = $paidTotalAmount;

        return $this;
    }

    /**
     * Get the value of remainingTotalAmount
     */ 
    public function getRemainingTotalAmount()
    {
        return $this->remainingTotalAmount;
    }

    /**
     * Set the value of remainingTotalAmount
     *
     * @return  self
     */ 
    public function setRemainingTotalAmount($remainingTotalAmount)
    {
        $this->remainingTotalAmount = $remainingTotalAmount;

        return $this;
    }
}