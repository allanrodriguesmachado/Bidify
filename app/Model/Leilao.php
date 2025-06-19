<?php

namespace App\Model;

class Leilao
{
    private array $lances;

    public function __construct(private readonly string $descricao)
    {
        $this->lances = [];
    }

    public function recebeLance(Lance $lance): void
    {
        if(!empty($this->lances) && $lance->getUsuario() == $this->lanceDoUltimoUsuario()) {
            return;
        }

        $this->lances[] = $lance;
    }

    public function getLances(): array
    {
        return $this->lances;
    }

    private function lanceDoUltimoUsuario()
    {
        return $this->lances[count($this->lances) - 1]->getUsuario();
    }
}