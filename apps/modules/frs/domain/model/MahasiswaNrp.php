<?php

namespace Kel5\FRS\Domain\Model;

class MahasiswaNrp
{
    private $nrp;

    public function getNrp()
    {
        return $this->nrp;
    }

    public function __construct($nrp = null)
    {
        $this->nrp = $nrp;
    }

    public function equals(MahasiswaNrp $mahasiswaNrp){
        return $this->nrp === $mahasiswaNrp->nrp;
    }


}