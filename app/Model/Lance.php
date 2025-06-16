<?php

namespace App\Model;

class Lance extends Leilao
{
    public function __construct(private readonly Usuario $usuario, private readonly float $valor)
    {
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function getValor(): float
    {
        return $this->valor;
    }
}
