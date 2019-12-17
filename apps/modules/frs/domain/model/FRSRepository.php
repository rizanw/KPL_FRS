<?php

namespace Kel5\FRS\Domain\Model;

interface FRSRepository
{
    public function getMahasiswaByNrp($nrp);
    public function getAnakWaliByNip($nip);
    public function getFrsByNrp($nrp, $periode, $tahun);
    public function addKelasTerpilih(KelasTerpilih $kelasTerpilih);
    public function ambilKelasUpmb() : array;
    public function ambilKelasDept() : array;
}
