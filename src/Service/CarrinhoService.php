<?php

namespace App\Service;

use App\Carrinho;

class CarrinhoService
{
    private Carrinho $carrinho;

    public function __construct(Carrinho $carrinho)
    {
        $this->carrinho = $carrinho;
    }

    public function calcularTotais(): array
    {
        $totalBruto = 0;
        $totalImpostos = 0;

        foreach ($this->carrinho->listarItens() as $item) {
            $produto = $item['produto'];
            $quantidade = $item['quantidade'];
            $precoTotalProduto = $produto->getPreco() * $quantidade;
            $impostoProduto = ($produto->getCategoria()->getImposto() / 100) * $precoTotalProduto;

            $totalBruto += $precoTotalProduto;
            $totalImpostos += $impostoProduto;
        }

        $totalLiquido = $totalBruto + $totalImpostos;

        return [
            'total_bruto' => $totalBruto,
            'total_impostos' => $totalImpostos,
            'total_liquido' => $totalLiquido,
        ];
    }
}
