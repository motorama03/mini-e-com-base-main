<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewHome;
use App\View\Viewproduto;

use App\Db\Connection;
use App\Model\Modelproduto;

class Controllerproduto extends ControllerPadrao
{
    function processPage(){
        //var_dump(Connection::get());

        $oModelProduto = new Modelproduto;

        $a = $oModelProduto->getAll();

        //var_dump($a);

        $sTitle = 'produtos';

        $sContent = Viewproduto::render([
            'produtoContent' => '<h1>Área de edição</h1>',
            'Tabelaproduto' => Viewproduto::getHtmlTabelaprodutos($a)
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
    

    function processdelete(){
        $iidprodutos = $_GET['proid'] ??= '';
        

        $oModelProduto = new Modelproduto;
        $oModelProduto->id = $iidprodutos;

        $oModelProduto->deleteproduto();

        return $this->processPage();
    }       
    
}
