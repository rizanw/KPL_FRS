<?php

namespace Kel5\FRS\Domain\Model;

class KelasTerpilih
{
    private $idFrs;
    private $idKelas;
    private $nrp;

    public function __construct($idFrs, $idKelas, $nrp)
    {
        $this->idFrs = $idFrs;
        $this->idKelas = $idKelas;
        $this->nrp = $nrp;
    }

    /**
     * @return mixed
     */
    public function getNrp()
    {
        return $this->nrp;
    }

    /**
     * @return mixed
     */
    public function getIdFrs()
    {
        return $this->idFrs;
    }

    /**
     * @return mixed
     */
    public function getIdKelas()
    {
        return $this->idKelas;
    }


}