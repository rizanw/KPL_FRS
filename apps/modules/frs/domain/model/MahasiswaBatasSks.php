<?php

namespace Kel5\FRS\Domain\Model;

class MahasiswaBatasSks
{
    private $batasSks;

    public function __construct($batasSks = null)
    {
        $this->batasSks = $batasSks;
    }

    /**
     * @return null
     */
    public function getBatasSks()
    {
        return $this->batasSks;
    }

}