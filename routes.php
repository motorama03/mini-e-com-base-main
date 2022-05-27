<?php

/**
 * Rederiza o conteúdo da página solicitada
 * @param string $sPage
 * @return string
 */
function render($sPage)
{
    switch ($sPage) {
        case 'home':
            return (new App\Controller\ControllerHome)->render();
        case 'produtos':
            return (new App\Controller\Controllerproduto)->render();
        case 'registro':
            return (new App\Controller\Controlleregistro)->render();
    }

    return 'Página não encontrada!';
}
