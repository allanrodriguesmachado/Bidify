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
        $nomeCompleto = new Usuario("Allan Rodrigues");

        $partes = explode(' ', trim($nomeCompleto->getNome()));


        $temNomeESobrenome = count($partes) >= 2 && !in_array('', $partes);
        $this->assertTrue($temNomeESobrenome, "O nome deve conter nome e sobrenome.");
    }
}