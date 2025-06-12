<?php

namespace App\Test\Service;
use App\Model\Avaliador;
use App\Model\Lance;
use App\Model\Leilao;
use App\Model\Usuario;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{
    public function test()
    {
        $leilao = new Leilao('Fiat 147 0KM');
        $userOne = new Usuario('Allan');
        $userTwo = new Usuario('Allan');
        $lanceOne = new Lance($userOne,'3000');
        $lanceTwo = new Lance($userTwo,'2000');

        $leilao->recebeLance($lanceOne);
        $leilao->recebeLance($lanceTwo);

        $avaliador = new Avaliador();
        $avaliador->avalia($leilao);

        $this->assertEquals("3000", $avaliador->getMaiorValor());
    }

    public function testMenorValor()
    {
        $leilao = new Leilao('Fiat 147 0KM');
        $userOne = new Usuario('Allan');
        $userTwo = new Usuario('Allan');
        $lanceOne = new Lance($userOne,'3000');
        $lanceTwo = new Lance($userTwo,'2000');

        $leilao->recebeLance($lanceOne);
        $leilao->recebeLance($lanceTwo);

        $avaliador = new Avaliador();
        $avaliador->avalia($leilao);

        $this->assertEquals("2000", $avaliador->getMenorValor());
    }
}