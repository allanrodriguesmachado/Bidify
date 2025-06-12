<?php

use App\Model\{Avaliador, Lance, Leilao, Usuario};

require_once __DIR__ . "/../vendor/autoload.php";

$leilao = new Leilao('Fiat 147 0KM');
$userOne = new Usuario('Allan');
$userTwo = new Usuario('Allan');
$lanceOne = new Lance($userOne,'3000');
$lanceTwo = new Lance($userTwo,'2000');

$leilao->recebeLance($lanceOne);
$leilao->recebeLance($lanceTwo);

$avaliador = new Avaliador();
$avaliador->avalia($leilao);

$numeroFormato = number_format($avaliador->getMaiorValor(), "2", ".", ",") . PHP_EOL;
$numeroFormato = number_format($avaliador->getMenorValor(), "2", ".", ",") . PHP_EOL;


echo sprintf("Valor: %s", $numeroFormato);