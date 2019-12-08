<?php

namespace Kel5\FRS\Domain\Model;

class Mahasiswa
{
    private $nama;
    private $nrp;
    private $ipk;
    private $doswal;

    public function __construct($nrp, $nama, $ipk, $doswal)
    {
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->ipk = $ipk;
        $this->doswal = $doswal;
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
    public function getNrp()
    {
        return $this->nrp;
    }

    /**
     * @return mixed
     */
    public function getDoswal()
    {
        return $this->doswal;
    }

    /**
     * @return mixed
     */
    public function getIpk()
    {
        return $this->ipk;
    }

}