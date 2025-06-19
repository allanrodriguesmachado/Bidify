<?php

namespace App\Test\Service;

use App\Model\Avaliador;
use App\Model\Lance;
use App\Model\Leilao;
use App\Model\Usuario;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class LeiaoTest extends TestCase
{
    public function testLeilaoNaoDeveReceberLancesRepetidos()
    {
        $allan = new Usuario("Allan");

        $leilao = new Leilao("Ford KA");
        $leilao->recebeLance(new Lance($allan, "1000"));
        $leilao->recebeLance(new Lance($allan, "2000"));

        self::assertCount(1, $leilao->getLances());
        self::assertEquals("1000", $leilao->getLances()[0]->getValor());
    }
    #[DataProvider('getLances')]
    public function testLeilaoDevReceberLances(int $qtdLeilao, Leilao $leilao, array $valores)
    {
        self::assertCount($qtdLeilao, $leilao->getLances());
        foreach ($valores AS $id => $value) {
            self::assertEquals($value, $leilao->getLances()[$id]->getValor());
        }
    }
    public static function getLances(): array
    {
        $jhon = new Usuario("Jhon");
        $maria = new Usuario("Maria");
        $jao = new Usuario("Joao");

        $leilao1 = new Leilao("i 30");
        $leilao2 = new Leilao("Fiat UNO");

        $leilao1->recebeLance(new Lance($jao, 2000));
        $leilao2->recebeLance(new Lance($jhon, 1000));
        $leilao2->recebeLance(new Lance($maria, 1100));

        return [
            'leilao_1' => [1, $leilao1, [2000]],
            'leilao_2' => [2, $leilao2, [1000, 1100]]
        ];
    }
}