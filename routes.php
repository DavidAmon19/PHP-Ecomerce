<?php

use App\Controller\CarrinhoController;
use App\Controller\ProdutoController;
use App\Controller\ResumoController;

function mountRoute(string $controllerName, string $methodName): array
{
    return [
        'controller' => $controllerName,
        'method' => $methodName . 'Action',
    ];
}

return [
    '/' => mountRoute(ProdutoController::class, 'listar'),
    '/produtos' => mountRoute(ProdutoController::class, 'listar'),
    '/carrinho' => mountRoute(CarrinhoController::class, 'exibir'),
    '/carrinho/adicionar' => mountRoute(CarrinhoController::class, 'adicionar'),
    '/carrinho/remover' => mountRoute(CarrinhoController::class, 'remover'),
    '/carrinho/editar' => mountRoute(CarrinhoController::class, 'editar'), 
    '/resumo' => mountRoute(ResumoController::class, 'mostrar'),
];
