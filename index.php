<?php

require_once 'autoload.php';
require_once 'config/config.php';

use App\Core;
use App\Lib\Error;
use App\Lib\Conexao;

session_start();

error_reporting(E_ALL & ~E_NOTICE);

try {
    
    $core = new Core();
    $core->run();
    Conexao::getConnection();

} catch (\Exception $exc) {

    $objErro = new Error($exc);
    $objErro->render();

}