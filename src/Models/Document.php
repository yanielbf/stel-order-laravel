<?php

namespace Otiumtek\StelOrderLaravel\Models;

class Document {

    private $id;
    private $reference;
    private $title;
    private $currencyCode;
    private $date;
    private $documentStateId;
    private $totalAmount;
    private $pdfPath;
    private $accountId;
    private $invoicingAddressId;
    private $comments;
    private $lines;

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
            'reference' => 'setReference',
            'title' => 'setTitle',
            'date' => 'setDate',
            'total-amount' => 'setTotalAmount',
            'pdf-path' => 'setPdfPath', 
            'account-id' => 'setAccountId',
            'currency-code' => 'setCurrencyCode',
            'document-state-id' => 'setDocumentStateId',
            'invoicing-address-id' => 'setInvoicingAddressId',
            'comments' => 'setComments',
        ];
    }

    public static function mapperComplex(){
        return [
            'lines' => ['setLines', 'Otiumtek\StelOrderLaravel\Models\DocumentItem'],
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
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

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
     * Get the value of pdfPath
     */ 
    public function getPdfPath()
    {
        return $this->pdfPath;
    }

    /**
     * Set the value of pdfPath
     *
     * @return  self
     */ 
    public function setPdfPath($pdfPath)
    {
        $this->pdfPath = $pdfPath;

        return $this;
    }

    /**
     * Get the value of accountId
     */ 
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Set the value of accountId
     *
     * @return  self
     */ 
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
    }

    /**
     * Get the value of currencyCode
     */ 
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * Set the value of currencyCode
     *
     * @return  self
     */ 
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * Get the value of lines
     */ 
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * Set the value of lines
     *
     * @return  self
     */ 
    public function setLines($lines)
    {
        $this->lines = $lines;

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
     * Get the value of documentStateId
     */ 
    public function getDocumentStateId()
    {
        return $this->documentStateId;
    }

    /**
     * Set the value of documentStateId
     *
     * @return  self
     */ 
    public function setDocumentStateId($documentStateId)
    {
        $this->documentStateId = $documentStateId;

        return $this;
    }

    /**
     * Get the value of invoicingAddressId
     */ 
    public function getInvoicingAddressId()
    {
        return $this->invoicingAddressId;
    }

    /**
     * Set the value of invoicingAddressId
     *
     * @return  self
     */ 
    public function setInvoicingAddressId($invoicingAddressId)
    {
        $this->invoicingAddressId = $invoicingAddressId;

        return $this;
    }

    /**
     * Get the value of comments
     */ 
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set the value of comments
     *
     * @return  self
     */ 
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }
}