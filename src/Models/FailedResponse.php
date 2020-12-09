<?php 

namespace Otiumtek\StelOrderLaravel\Models;

class FailedResponse {
    
    private $status;
    private $reason;
    private $errorFrom;

    public static function make($status, $reason, $errorFrom){
        $instance = new self();
        $instance->setStatus($status);
        $instance->setReason($reason);
        $instance->setErrorFrom($errorFrom);
        return $instance;
    }
    
    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of reason
     */ 
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set the value of reason
     *
     * @return  self
     */ 
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get the value of errorFrom
     */ 
    public function getErrorFrom()
    {
        return $this->errorFrom;
    }

    /**
     * Set the value of errorFrom
     *
     * @return  self
     */ 
    public function setErrorFrom($errorFrom)
    {
        $this->errorFrom = $errorFrom;

        return $this;
    }
}