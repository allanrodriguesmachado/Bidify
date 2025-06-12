<?php

namespace App\Model;
class Avaliador
{
    private float $maiorValor = 0;
    private float $menorValor = 0;
    public function avalia(Leilao $leilao): void
    {
        foreach ($leilao->getLances() as $lance) {
            var_dump([count($lance->getLances())]);
            exit();
            if ($lance->getValor() < $this->menorValor) {
                $this->menorValor = $lance->getValor();
            }

            if($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            }
        }
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