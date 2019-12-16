<?php

namespace Kel5\FRS\Domain\Model;

class Mahasiswa
{
    private $nama;
    private $nrp;
    private $ipk;
    private $doswal;
    private $alamat;

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

    public function __construct(MahasiswaNrp $nrp, $nama, $ipk, Dosen $doswal, $alamat)
    {
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->ipk = $ipk;
        $this->doswal = $doswal;
        $this->alamat = $alamat;
    }



}