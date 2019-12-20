<?php

namespace Kel5\FRS\Domain\Model;

class Mahasiswa
{
    private $nama;
    private $nrp;
    private $ipk;
    private $doswal;
    private $alamat;

    public function __construct(MahasiswaNrp $nrp, $nama, $ipk, Dosen $dosen, $alamat)
    {
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->ipk = $ipk;
        $this->doswal = $dosen;
        $this->alamat = $alamat;
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

    /**
     * @return mixed
     */
    public function getAlamat()
    {
        return $this->alamat;
    }
}