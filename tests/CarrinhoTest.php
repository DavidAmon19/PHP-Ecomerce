<?php

use PHPUnit\Framework\TestCase;
use App\Carrinho;
use App\Produto;
use App\Categoria;
use App\Service\CarrinhoService;

class CarrinhoTest extends TestCase
{
    public function testAdicionarProduto()
    {
        $categoria = new Categoria('Eletrodomésticos', 10);
        $produto = new Produto('Geladeira', 2500, $categoria, 'imagens/geladeira-electrolux.jpg');
        $carrinho = new Carrinho();

        $carrinho->adicionarProduto($produto, 1);
        $itens = $carrinho->listarItens();

        $this->assertCount(1, $itens);
        $this->assertEquals('Geladeira', $itens['Geladeira']['produto']->getNome());
        $this->assertEquals(1, $itens['Geladeira']['quantidade']);
    }

    public function testAdicionarProdutoComQuantidadeZero()
    {
        $categoria = new Categoria('Eletrodomésticos', 10);
        $produto = new Produto('Geladeira', 2500, $categoria, 'imagens/geladeira-electrolux.jpg');
        $carrinho = new Carrinho();

        $carrinho->adicionarProduto($produto, 0);
        $itens = $carrinho->listarItens();

        $this->assertCount(0, $itens);
    }

    public function testCalcularTotais()
    {
        $categoria = new Categoria('Eletrodomésticos', 10);
        $produto = new Produto('Geladeira', 2500, $categoria, 'imagens/geladeira-electrolux.jpg');
        $carrinho = new Carrinho();
        $carrinhoService = new CarrinhoService($carrinho);

        $carrinho->adicionarProduto($produto, 2);
        $totais = $carrinhoService->calcularTotais();

        $this->assertEquals(5000, $totais['total_bruto']);
        $this->assertEquals(500, $totais['total_impostos']);
        $this->assertEquals(5500, $totais['total_liquido']);
    }

    public function testRemoverProduto()
    {
        $categoria = new Categoria('Eletrodomésticos', 10);
        $produto = new Produto('Geladeira', 2500, $categoria, 'imagens/geladeira-electrolux.jpg');
        $carrinho = new Carrinho();

        $carrinho->adicionarProduto($produto, 1);
        $carrinho->removerProduto('Geladeira');
        $itens = $carrinho->listarItens();

        $this->assertCount(0, $itens);
    }

    public function testEditarQuantidadeProduto()
    {
        $categoria = new Categoria('Eletrodomésticos', 10);
        $produto = new Produto('Geladeira', 2500, $categoria, 'imagens/geladeira-electrolux.jpg');
        $carrinho = new Carrinho();

        $carrinho->adicionarProduto($produto, 2);
        $carrinho->editarQuantidade('Geladeira', 5);
        $itens = $carrinho->listarItens();

        $this->assertEquals(5, $itens['Geladeira']['quantidade']);
    }

    public function testCarrinhoVazioCalcularTotais()
    {
        $carrinho = new Carrinho();
        $carrinhoService = new CarrinhoService($carrinho);
        $totais = $carrinhoService->calcularTotais();

        $this->assertEquals(0, $totais['total_bruto']);
        $this->assertEquals(0, $totais['total_impostos']);
        $this->assertEquals(0, $totais['total_liquido']);
    }
}
