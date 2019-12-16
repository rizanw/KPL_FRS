<?php


namespace Kel5\FRS\Application;


class MenampilkanKelasResponse
{
    public $kelas;

    public function __construct()
    {
        $this->kelas = array();
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
           'nama_dosen' =>$nama_dosen);
           array_push($this->kelas, $kelas);
    }
}