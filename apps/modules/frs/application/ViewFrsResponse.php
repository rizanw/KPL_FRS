<?php

namespace Kel5\FRS\Application;

use Kel5\FRS\Domain\Model\Dosen;

class ViewFrsResponse
{
    public $frs;
    public $mahasiswa;

    public function __construct()
    {
        $this->frs = array();
        $this->mahasiswa = array();
    }

    public function addFrsResponse($id, $nrp, $periode, $tahun, $isDisetujui)
    {
        $this->frs = array(
            'id' => $id,
            'nrp' => $nrp,
            'periode' => $periode,
            'tahun' => $tahun,
            'is_disetujui' => $isDisetujui
        );

        return $this->frs;
    }

    public function addMahasiswaFrsResponse($nrp, $nama, $ipk, Dosen $doswal, $alamat)
    {
        $this->mahasiswa = array(
            'nrp' => $nrp,
            'nama' => $nama,
            'ipk' => $ipk,
            'doswalnama' => $doswal->getNama(),
            'doswalnip' => $doswal->getNip(),
            'alamat' => $alamat
        );

        return $this->mahasiswa;
    }
}