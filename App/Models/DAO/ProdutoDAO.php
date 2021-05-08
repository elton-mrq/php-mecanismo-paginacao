<?php

namespace App\Models\DAO;

use App\Models\Entidades\Produto;
use App\Lib\Paginacao;

class ProdutoDAO extends BaseDAO
{

    public function __construct()
    {
        parent::__construct('produto');
    }

    public function buscaComPaginacao($buscaProduto, $totalPorPagina, $paginaSelecionada)
    {

        $paginaSelecionada = (!$paginaSelecionada) ? 1 : $paginaSelecionada;

        $inicio = (($paginaSelecionada - 1) * $totalPorPagina);

        $whereBusca = "nome
                           LIKE '%{$buscaProduto}%' OR descricao
                           LIKE '%{$buscaProduto}%' OR ean = '{$buscaProduto}'";
        
        $resultadoTotal = $this->select("", "", "", "count(*) as total")->fetch()['total'];

        $resultado = $this->select($whereBusca, "", "{$inicio},{$totalPorPagina}")->fetchAll(\PDO::FETCH_CLASS, Produto::class);

        $totalLinhas = $resultadoTotal;

        return ['paginaSelecionada'     => $paginaSelecionada,
                'totalPorPagina'        => $totalPorPagina,
                'totalLinhas'           => $totalLinhas,
                'resultado'             => $resultado];

    }
}