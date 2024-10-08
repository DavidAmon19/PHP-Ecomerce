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

    public function listarItens(): array
    {
        return $this->itens;
    }
}
