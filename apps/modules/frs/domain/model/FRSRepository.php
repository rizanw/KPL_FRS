<?php

namespace Kel5\FRS\Domain\Model;

interface FRSRepository
{
    public function getMahasiswaByNrp(MahasiswaNrp $nrp) : ?Mahasiswa;
    public function getAnakWaliByNip($nip);
    public function ambilKelasUpmb() : array;
    public function ambilKelasDept() : array;
}
