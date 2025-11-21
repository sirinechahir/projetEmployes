<?php

namespace App\Exceptions;
use Exception;

class UserException extends Exception{

    protected $userMessage;

    public function __construct($userMessage, $message="", $code=0){
        $this->userMessage=$userMessage;
        parent::__construct($message);
        $this->code=$code;
    }
    public function getUserMessage(){
        return $this->userMessage;
    }
}
