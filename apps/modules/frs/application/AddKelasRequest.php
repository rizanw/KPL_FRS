<?php


namespace Kel5\FRS\Application;

class AddKelasRequest
{
    public $idFrs;
    public $nrp;
    public $idKelas;

    public function __construct($idFrs, $idkelas, $nrp)
    {
        $this->idFrs = $idFrs;
        $this->idKelas = $idkelas;
        $this->nrp = $nrp;
    }
}