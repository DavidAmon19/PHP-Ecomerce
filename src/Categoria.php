<?php

namespace App;


class Categoria
{
    private string $nome;
    private float $imposto;

    public function __construct(string $nome, float $imposto)
    {
        if ($imposto < 0) {
            throw new \InvalidArgumentException("O imposto não pode ser negativo.");
        }

        $this->nome = $nome;
        $this->imposto = $imposto;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getImposto(): float
    {
        return $this->imposto;
    }
}
