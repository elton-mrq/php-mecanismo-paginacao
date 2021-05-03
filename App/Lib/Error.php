<?php

namespace App\Lib;

use Exception;

class Error
{
    private $message;
    private $code;

    public function __construct(Exception $exc)
    {
        $this->message = $exc->getMessage();
        $this->code = $exc->getCode();
    }

    public function render()
    {
        $varMsg = $this->message;
        
        if(file_exists(PATH . '/App/Views/error/' . $this->code . '.php')){
            require_once PATH . '/App/Views/error/' . $this->code . '.php';            
        }else{
            require_once PATH . '/App/Views/erros/500.php';
        }
    }
}