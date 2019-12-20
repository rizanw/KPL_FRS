<?php


namespace Kel5\FRS\Application;


class ViewKelasResponse
{
    public $kelas;

    public function __construct()
    {
        $this->kelas = array();
    }

    public function  tambahKelas($id_kelas, $mata_kuliah, $kode_matkul, $sks, $grup, $kapasitas, $nama_dosen)
    {
           $kelas = array(
               'id' => $id_kelas,
               'mata_kuliah' => $mata_kuliah,
               'kode_matkul' => $kode_matkul,
               'sks' => $sks,
               'grup' => $grup,
               'kapasitas' => $kapasitas,
               'dosen_nama' => $nama_dosen,
           );
           array_push($this->kelas, $kelas);
    }
}