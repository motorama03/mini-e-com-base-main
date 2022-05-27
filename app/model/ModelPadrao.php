<?php

namespace App\Model;

use App\Db\Connection;

abstract class ModelPadrao
{
    abstract function getTable();

    function getAll()
    {
        $oConnection = Connection::get();
        
        $sSelect = 'select * from '.$this->getTable();

        $oResult = pg_query($oConnection, $sSelect);

        $aData= [];

        while($aResultado = pg_fetch_assoc($oResult)){
            $aData[] = $aResultado;
        }

        return $aData;
    }

    protected function insert($aValues)
    {
        // Implementar toda parte de insert já feita nas attvds anteriores
        $oConnection = connection::get();

        $inomeproduto = $_POST['tipoprodutos'];

        $iprecoprodutos = $_POST['precoprodutos'];

        $iquantidadeprodutos = $_POST['quantidadeprodutos'];

        echo $inomeproduto;

        $ssql = "
            insert into ".$this->getTable()."(tipoprodutos, precoprodutos, quantidadeprodutos) values ('".$inomeproduto."', '".$iprecoprodutos."', ".$iquantidadeprodutos.");
        ";
        
    file_put_contents('\xampp\htdocs\cursophp\text.txt', $ssql);
       return pg_query($oConnection, $ssql);    
    }


    protected function delete($aWhere)
    {
        $oConnection = connection::get();

        $ssql = '
            delete from '.$this->getTable().' where 1=1
        ';

        foreach($aWhere as $sNomeColuna => $sValor){
            $ssql .=' and '.$sNomeColuna.' = '.$sValor;
        }

       return pg_query($oConnection, $ssql);
    }

    protected function update($aValues, $aWhere)
    {

        $oConnection = Connection::get();

        $ssql = '
            update '.$this->getTable().'
        ';

        foreach($aWhere as $sNomeColuna => $sValor){
            $ssql .=' and '.$sNomeColuna.' = '.$sValor;
        }
        
        return pg_query($oConnection, $ssql);
    }

        /*
 
        update treina.tbpessoa
        set logcodigo=7
        where pescodigo=3

        */

    /**
     * Retorna o valor pronto para ser 
     * adicionado no comando SQL
     * @param mixed $xValue
     * @return mixed
     */
    protected function getBdValue($xValue)
    {
        if (!empty($xValue) || !is_null($xValue)) {
            if (is_string($xValue)) {
                return '\'' . pg_escape_string($xValue) . '\'';
            }

            return $xValue;
        }

        return 'NULL';
    }
}


