<?php

namespace App\Test\Service;

use JetBrains\PhpStorm\NoReturn;
use App\Model\{Lance, Leilao, Usuario, Avaliador};
use PHPUnit\Framework\Attributes\{Before, DataProvider};
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{
    private readonly Avaliador $avaliador;
    #[NoReturn] #[Before]
    protected function initialize(): void
    {
        $this->avaliador = new Avaliador();
    }

    #[DataProvider('getAvaliador')]
    public function testMenorValor(Leilao $leilao)
    {
        $this->avaliador->avalia($leilao);
        $this->assertEquals("2000", $this->avaliador->getMenorValor());
    }

    #[DataProvider('getAvaliador')]
    public function testMaiorValor(Leilao $leilao)
    {
        $this->avaliador->avalia($leilao);
        $this->assertEquals("3000", $this->avaliador->getMaiorValor());
    }
    public static function getAvaliador(): array
    {
        $leilao = new Leilao('Fiat 147 0KM');
        $userOne = new Usuario('Allan');
        $userTwo = new Usuario('Rodrigues');
        $lanceOne = new Lance($userOne, '3000');
        $lanceTwo = new Lance($userTwo, '2000');

        $leilao->recebeLance($lanceOne);
        $leilao->recebeLance($lanceTwo);

        return [
            [$leilao]
        ];
    }
}