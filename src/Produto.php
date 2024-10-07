<?php

namespace App;

class Produto
{
    private string $nome;
    private float $preco;
    private Categoria $categoria;
    private string $imagem;

    public function __construct(string $nome, float $preco, Categoria $categoria, string $imagem)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->categoria = $categoria;
        $this->imagem = $imagem; 
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function getImagem(): string
    {
        return $this->imagem;  
    }
}
