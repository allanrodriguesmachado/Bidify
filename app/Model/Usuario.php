<?php

namespace App\Model;

class Usuario
{
    public function __construct(private readonly string $nome)
    {
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}
