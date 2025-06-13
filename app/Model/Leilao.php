<?php

namespace App\Model;

class Leilao
{
    private array $lances;

    public function __construct(private readonly string $descricao)
    {
        $this->lances = [];
    }

    public function getDesciptions(): string
    {
        return $this->descricao;
    }

    public function recebeLance(Lance $lance)
    {
        $this->lances[] = $lance;
    }

    /**
     * @return Lance[]
     */
    public function getLances(): array
    {
        return $this->lances;
    }
}
