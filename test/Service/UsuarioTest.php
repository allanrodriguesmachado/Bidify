<?php

namespace App\Test\Service;

use App\Model\Usuario;
use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase
{
    public function testUsuario()
    {
        $usuario = new Usuario("Allan Rodrigues");

        $qtdCarcteres = mb_strlen($usuario->getNome());

        $this->assertLessThan(25, $qtdCarcteres, "Atencao! Atingiu o limite");
    }

    public function testTemNomeESobrenome()
    {
        $this->assertNotEmpty(explode(' ',
            trim((new Usuario("Allan Rodrigues"))->getNome())),
            "O nome deve conter nome e sobrenome.");
    }
}