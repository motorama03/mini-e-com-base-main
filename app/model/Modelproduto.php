<?php

namespace App\Model;

use App\Model\ModelPadrao;

class Modelproduto extends ModelPadrao
{
    public $id;
    function getTable()
    {
        return 'projetofinal.tbprodutos';
    }

    function deleteproduto(){
        $iidprodutos = $this->id;

        return parent::delete([
            'idprodutos' => $iidprodutos
        ]);
    }

/*    function updateproduto(){
        $iidprodutos = $this->id;
        
        return parent::update([
            'idprodutos' => $iidprodutos    
        ]);
    }*/  
}