<?php

namespace App\Model;
class Avaliador
{
    private float $maiorValor = -INF;
    private float $menorValor = INF;
    private $maioresLances;


    public function avalia(Leilao $leilao): void
    {
        $lances = $leilao->getLances();

        foreach ($lances as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            }

            if ($lance->getValor() < $this->menorValor) {
                $this->menorValor = $lance->getValor();
            }
        }

        usort($lances, function (Lance $a, Lance $b) {
            return $b->getValor() <=> $a->getValor();
        });

        $this->maioresLances = array_slice($lances, 0, 3);
    }

    public function getMaioresLances()
    {
        return $this->maioresLances;
    }

    public function getMenorValor(): float
    {
        return $this->menorValor;
    }

    public function getMaiorValor(): float
    {
        return $this->maiorValor;
    }
}