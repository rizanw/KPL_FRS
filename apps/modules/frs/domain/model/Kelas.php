<?php
    
namespace Kel5\FRS\Domain\Model;

class Kelas
{
    public  $id_kelas;
    public  $mata_kuliah;
    public  $kode_matkul;
    public  $sks;
    public  $grup;
    public  $kapasitas;
    public  $dosen;
    public  $ruang;
    public  $Waktu_mulai;
    public  $waktu_selesai;
    public  $periode;
    public  $tahun;
    public  $is_upmb;
    public  $nama_dosen;

    /**
     * @return mixed
     */
    public function getNamaDosen()
    {
        return $this->nama_dosen;
    }

    /**
     * Kelas constructor.
     * @param $id_kelas
     * @param $mata_kuliah
     * @param $kode_matkul
     * @param $sks
     * @param $grup
     * @param $kapasitas
     * @param $dosen
     * @param $ruang
     * @param $Waktu_mulai
     * @param $waktu_selesai
     * @param $periode
     * @param $tahun
     */
    public function __construct($id_kelas, $mata_kuliah, $kode_matkul, $sks,
                                $grup, $kapasitas, $dosen, $ruang, $Waktu_mulai, $waktu_selesai, $periode, $tahun,$nama_dosen)
    {
        $this->id_kelas = $id_kelas;
        $this->mata_kuliah = $mata_kuliah;
        $this->kode_matkul = $kode_matkul;
        $this->sks = $sks;
        $this->grup = $grup;
        $this->kapasitas = $kapasitas;
        $this->dosen = $dosen;
        $this->ruang = $ruang;
        $this->Waktu_mulai = $Waktu_mulai;
        $this->waktu_selesai = $waktu_selesai;
        $this->periode = $periode;
        $this->tahun = $tahun;
        $this->nama_dosen = $nama_dosen;
    }

    /**
     * @return mixed
     */
    public function getIdKelas()
    {
        return $this->id_kelas;
    }

    /**
     * @return mixed
     */
    public function getMataKuliah()
    {
        return $this->mata_kuliah;
    }

    /**
     * @return mixed
     */
    public function getKodeMatkul()
    {
        return $this->kode_matkul;
    }

    /**
     * @return mixed
     */
    public function getSks()
    {
        return $this->sks;
    }

    /**
     * @return mixed
     */
    public function getGrup()
    {
        return $this->grup;
    }

    /**
     * @return mixed
     */
    public function getKapasitas()
    {
        return $this->kapasitas;
    }

    /**
     * @return mixed
     */
    public function getDosen()
    {
        return $this->dosen;
    }

    /**
     * @return mixed
     */
    public function getRuang()
    {
        return $this->ruang;
    }

    /**
     * @return mixed
     */
    public function getWaktuMulai()
    {
        return $this->Waktu_mulai;
    }

    /**
     * @return mixed
     */
    public function getWaktuSelesai()
    {
        return $this->waktu_selesai;
    }

    /**
     * @return mixed
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * @return mixed
     */
    public function getTahun()
    {
        return $this->tahun;
    }

    /**
     * @return mixed
     */
    public function getIsUpmb()
    {
        return $this->is_upmb;
    }



}