<?php

namespace App\Controller;

use App\Service\CarrinhoService;
use App\Carrinho;

class ResumoController
{
    public function mostrarAction()
    {
        session_start();
        $carrinho = $_SESSION['carrinho'] ?? new Carrinho();
        
        $carrinhoService = new CarrinhoService($carrinho);

        if (empty($carrinho->listarItens())) {
            echo "O carrinho está vazio.";
            return;
        }

        $totais = $carrinhoService->calcularTotais();

        if (!isset($_SESSION['numero_pedido'])) {
            $_SESSION['numero_pedido'] = rand(1000, 9999);
        }
        $numeroPedido = $_SESSION['numero_pedido'];

        $_SESSION['carrinho'] = new Carrinho();
        unset($_SESSION['numero_pedido']);

        require '../public/resumo.php';
    }
}
