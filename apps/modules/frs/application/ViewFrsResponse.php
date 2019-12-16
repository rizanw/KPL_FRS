<?php

namespace Kel5\FRS\Application;

class ViewFrsResponse
{
    public $frs;
    public $mahasiswa;

    public function __construct()
    {
        $this->frs = array();
        $this->mahasiswa = array();
    }

    public function addFrsResponse(

    )
    {
        $frs = array(

        );

        array_push($this->frs, $frs);
    }

    public function addMahasiswaFrsResponse($nrp, $nama, $ipk, $doswal)
    {
        $this->mahasiswa = array(
            'nrp' => $nrp,
            'nama' => $nama,
            'ipk' => $ipk,
            'doswal' => $doswal
        );

        return $this->mahasiswa;
    }
}