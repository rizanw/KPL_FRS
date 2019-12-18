<?php

namespace Kel5\FRS\Domain\Model;

class FRS
{
    private $id;
    private $mahasiswa;
    private $periode;
    private $tahun;
    private $isDisetujui;
    private $kelasTerpilih;
    private $totalSks;

    /**
     * @return mixed
     */
    public function getTotalSks()
    {
        foreach ($this->kelasTerpilih as $kelas){
            $this->totalSks += $kelas->getSks();
        }

        return $this->totalSks;
    }

    public function addKelas(Kelas $kelas)
    {
        $exist = false;
        foreach ($this->kelasTerpilih as $existingKelas){
            if($existingKelas->equals($kelas)){
                $exist = true;
            }
        }

        if(!$exist){
            array_push($this->kelasTerpilih, $kelas);

            $this->totalSks = $this->totalSks + $kelas->getSks();
            // todo: update kapasitas kelas
        } else {

            $this->totalSks = $this->totalSks + $kelas->getSks();
            return "kelas sudah diambil";
        }


    }


    public function __construct($id, Mahasiswa $mahasiswa, $periode, $tahun, $isDisetujui)
    {
        $this->id = $id ;
        $this->mahasiswa = $mahasiswa;
        $this->periode = $periode;
        $this->tahun = $tahun;
        $this->isDisetujui = $isDisetujui;

        $this->kelasTerpilih = array();
        $this->totalSks = 0;
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
    public function getMahasiswa()
    {
        return $this->mahasiswa;
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
    public function getIsDisetujui()
    {
        return $this->isDisetujui;
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
    public function getKelasTerpilih()
    {
        return $this->kelasTerpilih;
    }
}