<?php

namespace App\Model;

class Leilao
{
    private $lances;

    public function __construct(private readonly string $descricao)
    {
        $this->lances = [];
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
