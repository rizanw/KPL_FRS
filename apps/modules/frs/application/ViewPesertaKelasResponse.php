<?php


namespace Kel5\FRS\Application;


class ViewPesertaKelasResponse
{
    public $kelas;
    public $peserta;

    public function __construct()
    {
        $this->kelas = array();
        $this->peserta = array();
    }

    public function addKelas($nama_matkul, $kode_matkul, $sks, $grup, $ruang, $kapasitas, $nama_dosen, $hari, $jamMulai, $jamSelesai)
    {
           $this->kelas = array(
               'nama_matkul' => $nama_matkul,
               'kode_matkul' => $kode_matkul,
               'sks' => $sks,
               'grup' => $grup,
               'ruang' => $ruang,
               'kapasitas' => $kapasitas,
               'dosen_nama' => $nama_dosen,
               'hari' => $hari,
               'jam_mulai' => $jamMulai,
               'jam_selesai' => $jamSelesai
           );
           return $this->kelas;
    }

    public function tambahPeserta($nrp, $nama)
    {
        $peserta = array(
            'nrp' => $nrp,
            'nama' => $nama
        );
        array_push($this->peserta, $peserta);
    }
}