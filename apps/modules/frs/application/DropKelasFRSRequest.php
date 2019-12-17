<?php

namespace Kel5\FRS\Application;

class DropKelasFRSRequest
{
    public $idKelas;

    public function __construct($idKelas)
    {
        $this->idKelas = $idKelas;
    }
}