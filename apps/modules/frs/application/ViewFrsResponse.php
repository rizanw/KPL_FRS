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


    public function  tambahKelas($id_kelas, $mata_kuliah, $kode_matkul, $sks, $grup, $kapasitas, $dosen,
                                 $ruang, $Waktu_mulai, $waktu_selesai, $periode, $tahun, $nama_dosen)
    {
        $kelas = array('id_kelas' => $id_kelas,
            'mata_kuliah' => $mata_kuliah,
            'kode_matkul' => $kode_matkul,
            'sks' => $sks,
            'grup' => $grup,
            'kapasitas' => $kapasitas,
            'dosen' => $dosen,
            'ruang' => $ruang,
            'Waktu_mulai' => $Waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'periode' => $periode,
            'tahun' => $tahun,
            'nama_dosen' =>$nama_dosen
        );

        array_push($this->kelasTerpilih, $kelas);
    }
}