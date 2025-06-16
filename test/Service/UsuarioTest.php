<?php

namespace App\Test\Service;

use App\Model\Usuario;
use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase
{
    public function testUsuario()
    {
        $this->assertLessThan(25, mb_strlen((new Usuario("Allan Rodrigues"))->getNome()), "Atencao! Atingiu o limite");
    }

    public function testTemNomeESobrenome()
    {
        $this->assertNotEmpty(explode(' ',
            trim((new Usuario("Allan Rodrigues"))->getNome())),
            "O nome deve conter nome e sobrenome.");
    }
}