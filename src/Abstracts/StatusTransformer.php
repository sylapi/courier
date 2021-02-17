<?php
declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;

abstract class StatusTransformer
{
    private $status;
    
    public $statuses = [];

    public function __construct(string $status)
    {
        $this->status = $status;   
    }

    public function __toString()
    {
        return (isset($this->statuses[$this->status])) 
            ? $this->statuses[$this->status] 
            : $this->status;
    }
}
