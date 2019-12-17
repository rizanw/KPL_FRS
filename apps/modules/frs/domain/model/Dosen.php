<?php

namespace Kel5\FRS\Domain\Model;

use Phalcon\Exception;

class Dosen
{
    private $nama;
    private $nip;

    public function __construct($nip, $nama)
    {
        $this->nip = $nip;
        $this->nama = $nama;
    }

    /**
     * @return mixed
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * @return mixed
     */
    public function getNip()
    {
        return $this->nip;
    }


}