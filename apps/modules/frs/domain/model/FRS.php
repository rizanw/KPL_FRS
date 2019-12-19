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
    private $batasSks;
    private $sisaSks;

    public function checkBatasSKs() : bool
    {
        if($this->sisaSks <= 0){
            // TODO : thrown error => tidak ada sisa sks
//            print_r($this);
            print_r("tidak dapat melampaui batas sks");
            exit();
            return false;
        }
        return true;
    }

    public function addKelas(Kelas $kelas)
    {
        $exist = false;
        foreach ($this->kelasTerpilih as $existingKelas)
        {
            if ($existingKelas->equals($kelas)) {
                $exist = true;
            }
        }

        if (!$exist) {
            array_push($this->kelasTerpilih, $kelas);

            $this->totalSks = $this->totalSks + $kelas->getSks();
            $this->sisaSks = $this->batasSks - $this->totalSks;
            // todo: update kapasitas kelas

            return true;
        } else {
            $this->totalSks = $this->totalSks + $kelas->getSks();
            $this->sisaSks = $this->batasSks - $this->totalSks;
            return "kelas sudah diambil";
        }
    }

    private function setBatasSks($mahasiswa)
    {
        if ((float)$mahasiswa->getIpk() < 2.0) {
            $this->batasSks = 16;
        } elseif (2.0 <= (float)$mahasiswa->getIpk() && (float)$mahasiswa->getIpk() < 2.5) {
            $this->batasSks = 18;
        } elseif (2.5 <= (float)$mahasiswa->getIpk() && (float)$mahasiswa->getIpk() < 3.5) {
            $this->batasSks = 22;
        } elseif ((float)$mahasiswa->getIpk() >= 3.5){
            $this->batasSks = 24;
        }

        $this->sisaSks = $this->batasSks;
    }

    public function __construct($id, Mahasiswa $mahasiswa, $periode, $tahun, $isDisetujui)
    {
        $this->id = $id;
        $this->mahasiswa = $mahasiswa;
        $this->periode = $periode;
        $this->tahun = $tahun;
        $this->isDisetujui = $isDisetujui;

        $this->kelasTerpilih = array();
        $this->totalSks = 0;
        $this->setBatasSks($mahasiswa);
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

    /**
     * @return mixed
     */
    public function getTotalSks()
    {
        return $this->totalSks;
    }

    /**
     * @return mixed
     */
    public function getBatasSks()
    {
        return $this->batasSks;
    }

    /**
     * @return mixed
     */
    public function getSisaSks()
    {
        return $this->sisaSks;
    }
}