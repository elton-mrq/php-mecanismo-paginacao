<?php

namespace App\Controllers;

use App\Lib\Paginacao;
use App\Lib\Sessao;
use App\Models\DAO\ProdutoDAO;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtoDAO = new ProdutoDAO();

        $paginaSelecionada = isset($_GET['paginaSelecionada']) ? $_GET['paginaSelecionada'] : 1;
        $totalPorPagina    = isset($_GET['totalPorPagina']) ? $_GET['totalPorPagina'] : 5;

        if(isset($_GET['buscaProduto'])){
            
            $listaProduto = $produtoDAO->buscaComPaginacao($_GET['buscaProduto'], $totalPorPagina, $paginaSelecionada);
            
            $paginacao = new Paginacao($listaProduto);

            $this->setViewParam('buscaProduto', $_GET['buscaProduto']);
            $this->setViewParam('paginacao', $paginacao->criarLink($_GET['buscaProduto']));
            $this->setViewParam('listaProduto', $listaProduto['resultado']);
        }

        $this->setViewParam('totalPorPagina', $totalPorPagina);      
        
        $this->render('/produto/index');

        Sessao::limpaMensagem();
    }
}