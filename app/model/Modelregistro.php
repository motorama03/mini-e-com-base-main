<?php

namespace App\Model;

use App\Model\ModelPadrao;

class Modelregistro extends ModelPadrao
{
    public $iTipoProdutos, $iPrecoProdutos;
    function getTable()
    {
        return 'projetofinal.tbprodutos';
    }

    function insertproduto(){
        $this->iTipoProdutos = $_POST['tipoprodutos'] ??= '';
        $this->iPrecoProdutos = $_POST['precoprodutos'] ??= '';
        $this->iQuantidadeProdutos = $_POST['quantidadeprodutos'] ??= '';
        return parent::insert([
            'tipoprodutos' => $this->iTipoProdutos,
            'precoprodutos' => $this->iPrecoProdutos,
            'quantidadeprodutos' => $this->iQuantidadeProdutos    
        ]);
    }
}