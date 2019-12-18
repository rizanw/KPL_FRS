<?php

namespace Kel5\FRS\Domain\Model;

class MahasiswaBatasSks
{
    private $batasSks;

    public function __construct($batasSks = null)
    {
        $this->batasSks = $batasSks;
    }

    public function equals(MahasiswaBatasSks $mahasiswaBatasSks) : bool
    {
        return $this->batasSks === $mahasiswaBatasSks;
    }

    public function batasSks() : int
    {
        return $this->batasSks;
    }


}