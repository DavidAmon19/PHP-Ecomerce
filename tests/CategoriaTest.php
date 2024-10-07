<?php

use PHPUnit\Framework\TestCase;
use App\Categoria;

class CategoriaTest extends TestCase
{
    public function testCriacaoDeCategoria()
    {
        $categoria = new Categoria('Notebooks', 6);

        $this->assertEquals('Notebooks', $categoria->getNome());
        $this->assertEquals(6, $categoria->getImposto());
    }

    public function testCategoriaComImpostoInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Categoria('Notebooks', -5); 
    }
}
