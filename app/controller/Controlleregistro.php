<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\Viewregistro;

use App\Db\Connection;
use App\Model\Modelregistro;

class Controlleregistro extends ControllerPadrao
{

    function processPage()
    {
        //file_put_contents('\xampp\htdocs\cursophp\text.txt', 'aeeee');

        $otipoproduto = new Modelregistro;

        $a = $otipoproduto->getAll();
        
        $sTitle = 'Registro';

        $sContent = Viewregistro::render([
            // Passar aqui os parâmetros do conteúdo da página
            'registroContent' => '<h1>Área de edição</h1>',
            'Tabelaproduto' => Viewregistro::getHtmlTabelaprodutos($a)
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

function processInsert(){
    $iTipoProdutos = $_POST['tipoprodutos'] ??= '';
    $iPrecoProdutos = $_POST['precoprodutos'] ??= '';

    $oModeregistro = new Modelregistro();
    $oModeregistro->iTipoProdutos = $iTipoProdutos;
    $oModeregistro->iPrecoProdutos = $iPrecoProdutos;

    $oModeregistro->insertproduto();

    return $this->processPage();
    }
}