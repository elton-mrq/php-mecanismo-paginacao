<?php

namespace App\Controllers;

use App\Lib\Sessao;

abstract class Controller  
{
    protected $viewVar;
    private $app;

    public function __construct($app)
    {
        $this->setViewParam('nameController', $app->getController());
        $this->setViewParam('nameAction', $app->getAction());
    }

    public function setViewParam($varName, $varValue)
    {
        if($varName != "" && $varName != ""){
            return $this->viewVar[$varName] = $varValue;
        }
    }

    public function render($view)
    {
        $viewVar = $this->getViewVar();
        $Sessao = Sessao::class;

        require_once PATH . '/App/Views/layout/header.php';
        require_once PATH . '/App/Views/layout/menu.php';
        require_once PATH . '/App/Views/' . $view . '.php';
        require_once PATH . '/App/Views/layout/footer.php';

    }

    public function redirect($view)
    {
        header('Location : http://' . APP_HOST . $view);
        exit;
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }
}
