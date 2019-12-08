<?php

namespace Kel5\FRS\Domain\Model;

class Kelas
{
    private $id;
    private $kode;
    private $mataKuliah;
    private $sks;
    private $kelas;
    private $dosen;

    public function __construct($id, $kode, $mataKuliah, $sks, $kelas, $dosen)
    {
        $this->id = $id;
        $this->kode = $kode;
        $this->mataKuliah = $mataKuliah;
        $this->sks = $sks;
        $this->kelas = $kelas;
        $this->dosen = $dosen;
    }

    /**
     * @return mixed
     */
    public function getMataKuliah()
    {
        return $this->mataKuliah;
    }

    /**
     * @return mixed
     */
    public function getKode()
    {
        return $this->kode;
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
    public function getKelas()
    {
        return $this->kelas;
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
    public function getDosen()
    {
        return $this->dosen;
    }


}