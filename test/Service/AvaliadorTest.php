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

    public function testPegarOsTresMaioresValores(): void
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $qtd = mb_strlen($leilao->getDesciptions());


        $userOne = new Usuario('Allan');
        $userTwo = new Usuario('Rodrigues');
        $userThree = new Usuario('Machado');
        $userFour = new Usuario('Fernando');

        $leilao->recebeLance(new Lance($userOne,'3000'));
        $leilao->recebeLance(new Lance($userTwo,'2000'));
        $leilao->recebeLance(new Lance($userThree,'5000'));
        $leilao->recebeLance(new Lance($userFour,'1000'));

        $avaliador = new Avaliador();
        $avaliador->avalia($leilao);

        $maiores = $avaliador->getMaioresLances();


        $this->assertCount(3, $maiores);

        $this->assertLessThan(14, $qtd, "Atencao! Atingiu o limite");

        $this->assertEquals("5000", $maiores[0]->getValor(), "Maior Valor");
        $this->assertEquals("3000", $maiores[1]->getValor(), "Medio Valor");
        $this->assertEquals("2000", $maiores[2]->getValor(), "Baixo Valor");
    }
}