<?php

namespace Kel5\FRS\Domain\Model;

class KelasTerpilih
{
    private $idKelas;
    private $nrp;

    public function __construct($idKelas, $nrp)
    {
        $this->idKelas = $idKelas;
        $this->nrp = $nrp;
    }

    /**
     * @return mixed
     */
    public function getKode()
    {
        return $this->idKelas;
    }

    /**
     * @return mixed
     */
    public function getNrp()
    {
        return $this->nrp;
    }
}