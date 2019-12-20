<?php

namespace Kel5\FRS\Application;

use Kel5\FRS\Domain\Model\Dosen;

class ViewFrsResponse
{
    public $frs;
    public $mahasiswa;
    public $kelasTerpilih;

    public function __construct()
    {
        $this->frs = array();
        $this->mahasiswa = array();
        $this->kelasTerpilih = array();
    }

    public function addFrsResponse($id, $periode, $tahun, $isDisetujui, $totalSks, $batasSks, $sisaSks)
    {
        $this->frs = array(
            'id' => $id,
            'periode' => $periode,
            'tahun' => $tahun,
            'is_disetujui' => $isDisetujui,
            'total_sks' => $totalSks,
            'batas_sks' => $batasSks,
            'sisa_sks' => $sisaSks
        );

        return $this->frs;
    }

    public function addMahasiswaFrsResponse($nrp, $nama, $ipk, Dosen $doswal, $alamat)
    {
        $this->mahasiswa = array(
            'nrp' => $nrp,
            'nama' => $nama,
            'ipk' => $ipk,
            'doswal_nama' => $doswal->getNama(),
            'doswal_nip' => $doswal->getNip(),
            'alamat' => $alamat
        );

        return $this->mahasiswa;
    }


    public function  addKelas($id, $namaMatkul, $kodeMatkul, $sks, $grup, $periode, $tahun, $namaDosen)
    {
        $kelas = array(
            'id' => $id,
            'nama_matkul' => $namaMatkul,
            'kode_matkul' => $kodeMatkul,
            'sks' => $sks,
            'grup' => $grup,
            'periode' => $periode,
            'tahun' => $tahun,
            'nama_dosen' => $namaDosen
        );
        array_push($this->kelasTerpilih, $kelas);
    }
}