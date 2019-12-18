<?php

namespace Kel5\FRS\Domain\Model;

//TODO : Tambah aggregate FRS dan member kelas.
// Tambah invariant totalSks, batasSks.
// Fungsi cek batas sks.
// Cek ketika add kelas.
// Pastikan totalSks selalu konsisten dengan daftar kelas.

interface FRSRepository
{
    public function getAnakWaliByNip($nip);
    public function getKelasTerpilih(FRS $frs);

    public function getMahasiswaByNrp(MahasiswaNrp $nrp) : ?Mahasiswa;
    public function getFrsByNrp(MahasiswaNrp $mahasiswaNrp, $periode, $tahun) : ?FRS;


    public function ambilKelasUpmb() : array;
    public function ambilKelasDept() : array;

    public function confirmFrs($idFrs);
    public function cancelFrs($idFrs);

    public function dropKelas($idKelas);

    public function addKelasTerpilih(KelasTerpilih $kelasTerpilih);
}
