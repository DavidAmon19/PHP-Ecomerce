<?php

namespace App\Controller;

use App\Produto;
use App\Categoria;

class ProdutoController
{
    public function listarAction()
    {
        session_start();

        if (!isset($_SESSION['produtos'])) {
            $categoriaNotebook = new Categoria('Notebooks', 6);
            $categoriaSmartphone = new Categoria('Smart Phones', 8);
            $categoriaEletrodomesticos = new Categoria('Eletrodomésticos', 10);

            $produtos = [
                new Produto('Laptop Dell', 3000, $categoriaNotebook, 'imagens/laptop-dell.jpg'),
                new Produto('iPhone 12', 4000, $categoriaSmartphone, 'imagens/iphone-12.jpg'),
                new Produto('Geladeira Electrolux', 2500, $categoriaEletrodomesticos, 'imagens/geladeira-electrolux.jpg'),
                new Produto('Micro-ondas Panasonic', 800, $categoriaEletrodomesticos, 'imagens/micro-ondas-panasonic.jpg')
            ];

            $_SESSION['produtos'] = $produtos;
        }

        $produtos = $_SESSION['produtos'];

        require '../public/produtos.php';
    }
}
