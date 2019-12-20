<?php

namespace Kel5\FRS\Domain\Model;

class Kelas
{
    private $id;
    private $namaMataKuliah;
    private $kodeMataKuliah;
    private $sks;
    private $grup;
    private $dosen;
    private $ruang;
    private $hari;
    private $waktuMulai;
    private $waktuSelesai;
    private $periode;
    private $tahun;
    private $kapasitas;
    private $is_upmb;

    private $peserta;

    public function addPeserta(MahasiswaNrp $mahasiswaNrp, Mahasiswa $mahasiswa)
    {
        $exist = false;
        foreach ($this->peserta as $existingPeserta) {
            if ($existingPeserta->getNrp()->equals($mahasiswaNrp->getNrp())) {
                $exist = true;
            }
        }

        if (!$exist) {
            array_push($this->peserta, $mahasiswa);

            return true;
        } else {

            return "kelas sudah diambil";
        }
    }

    public function updateKapasitas($drop)
    {
        if ($drop) {
            return $this->kapasitas + 1;
        } else {
            return $this->kapasitas - 1;
        }
    }

    public function equals(Kelas $kelas)
    {
        if ($this->id == $kelas->id) {
            return true;
        }
        return false;
    }

    public function __construct($idKelas, $namaMatkul, $kodeMatkul, $sks, $grup, $kapasitas, $ruang, $hari, $waktuMulai, $waktuSelesai, $periode, $tahun, Dosen $dosen)
    {
        $this->id = $idKelas;
        $this->namaMataKuliah = $namaMatkul;
        $this->kodeMataKuliah = $kodeMatkul;
        $this->sks = $sks;
        $this->grup = $grup;
        $this->dosen = $dosen;
        $this->ruang = $ruang;
        $hari->hari = $hari;
        $this->waktuMulai = $waktuMulai;
        $this->waktuSelesai = $waktuSelesai;
        $this->periode = $periode;
        $this->tahun = $tahun;

        $this->kapasitas = $kapasitas;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNamaMataKuliah()
    {
        return $this->namaMataKuliah;
    }

    /**
     * @return mixed
     */
    public function getKodeMataKuliah()
    {
        return $this->kodeMataKuliah;
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
     * @return Dosen
     */
    public function getDosen(): Dosen
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
        return $this->waktuMulai;
    }

    /**
     * @return mixed
     */
    public function getWaktuSelesai()
    {
        return $this->waktuSelesai;
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
    public function getKapasitas()
    {
        return $this->kapasitas;
    }

    /**
     * @return mixed
     */
    public function getHari()
    {
        return $this->hari;
    }

}