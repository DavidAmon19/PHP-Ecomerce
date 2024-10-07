<?php

namespace App;


class Carrinho
{
    private array $itens = [];

    public function adicionarProduto(Produto $produto, int $quantidade)
    {
        if ($quantidade <= 0) {
            return;
        }

        if (isset($this->itens[$produto->getNome()])) {
            $this->itens[$produto->getNome()]['quantidade'] += $quantidade;
        } else {
            $this->itens[$produto->getNome()] = [
                'produto' => $produto,
                'quantidade' => $quantidade
            ];
        }
    }

    public function removerProduto(string $nomeProduto)
    {
        if (isset($this->itens[$nomeProduto])) {
            unset($this->itens[$nomeProduto]);
        }
    }

    public function editarQuantidade(string $nomeProduto, int $quantidade)
    {
        if (isset($this->itens[$nomeProduto])) {
            $this->itens[$nomeProduto]['quantidade'] = $quantidade;
        }
    }

    public function calcularTotais(): array
    {
        $totalBruto = 0;
        $totalImpostos = 0;

        foreach ($this->itens as $item) {
            $produto = $item['produto'];
            $quantidade = $item['quantidade'];
            $precoTotal = $produto->getPreco() * $quantidade;
            $imposto = $precoTotal * ($produto->getCategoria()->getImposto() / 100);

            $totalBruto += $precoTotal;
            $totalImpostos += $imposto;
        }

        return [
            'total_bruto' => $totalBruto,
            'total_impostos' => $totalImpostos,
            'total_liquido' => $totalBruto + $totalImpostos
        ];
    }

    public function listarItens(): array
    {
        return $this->itens;
    }
}
