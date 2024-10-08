<?php

namespace App\Controller;

use App\Carrinho;

class CarrinhoController
{
    public function exibirAction()
    {
        session_start();
        $carrinho = $_SESSION['carrinho'] ?? new Carrinho();

        $itens = $carrinho->listarItens();
        require '../public/carrinho.php';
    }

    public function adicionarAction()
    {
        session_start();
        $carrinho = $_SESSION['carrinho'] ?? new Carrinho();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomeProduto = $_POST['produto_nome'];
            $quantidade = (int)$_POST['quantidade'];
            
            $produtos = $_SESSION['produtos'];

            foreach ($produtos as $produto) {
                if ($produto->getNome() === $nomeProduto) {
                    $carrinho->adicionarProduto($produto, $quantidade);
                    break;
                }
            }

            $_SESSION['carrinho'] = $carrinho;
            header('Location: /carrinho');
            exit;
        }
    }

    public function removerAction()
    {
        session_start();
        $carrinho = $_SESSION['carrinho'] ?? new Carrinho();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomeProduto = $_POST['produto_nome'];
            $carrinho->removerProduto($nomeProduto);

            $_SESSION['carrinho'] = $carrinho;
            header('Location: /carrinho');
        }
    }
    public function editarAction()
    {
        session_start();
        $carrinho = $_SESSION['carrinho'] ?? new Carrinho();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomeProduto = $_POST['produto_nome'];
            $novaQuantidade = (int)$_POST['quantidade'];

            $carrinho->editarQuantidade($nomeProduto, $novaQuantidade);

            $_SESSION['carrinho'] = $carrinho;
            header('Location: /carrinho');
        }
    }
}
