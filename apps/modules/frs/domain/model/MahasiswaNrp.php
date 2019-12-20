<?php

namespace Kel5\FRS\Domain\Model;

class MahasiswaNrp
{
    private $nrp;

    public function __construct($nrp = null)
    {
        $this->nrp = $nrp;
    }

    public function equals(MahasiswaNrp $mahasiswaNrp) : bool
    {
        return $this->nrp === $mahasiswaNrp;
    }

    public function getNrp() : string
    {
        return $this->nrp;
    }
}