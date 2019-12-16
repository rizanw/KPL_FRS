<?php 

namespace Kel5\FRS\Infrastructure;

use Kel5\FRS\Domain\Model\Kelas;
use Phalcon\DiInterface;

use Kel5\FRS\Domain\Model\FRSRepository;
use Kel5\FRS\Domain\Model\Mahasiswa;

class SqlFRSRepository implements FRSRepository
{
    protected $di;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
    }

    public function ambilKelasDept() : array
    {
        $db =  $this->di->getShared('db');
        $sql = "Select * from kelas inner join dosen ON dosen.nip = kelas.dosen where is_upmb = 0";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);
        $resultArray= array();

        foreach($result as $row)
        {

            $kelas = new Kelas(
                $row['id_kelas'],
                $row['mata_kuliah'],
                $row['kode_matkul'],
                $row['sks'],
                $row['grup'],
                $row['kapasitas'],
                $row['dosen'],
                $row['ruang'],
                $row['Waktu_mulai'],
                $row['waktu_selesai'],
                $row['periode'],
                $row['tahun'],
                $row['nama']
            );
            array_push($resultArray, $kelas);
        }

        return $resultArray;
    }

    public function ambilKelasUpmb() : array
    {
        $db =  $this->di->getShared('db');
        $sql = "Select * from kelas inner join dosen ON dosen.nip = kelas.dosen where is_upmb = 1";

        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);
        $resultArray= array();

        foreach($result as $row)
        {

            $kelas = new Kelas(
                $row['id_kelas'],
                $row['mata_kuliah'],
                $row['kode_matkul'],
                $row['sks'],
                $row['grup'],
                $row['kapasitas'],
                $row['dosen'],
                $row['ruang'],
                $row['Waktu_mulai'],
                $row['waktu_selesai'],
                $row['periode'],
                $row['tahun'],
                $row['nama']
            );
            array_push($resultArray, $kelas);
        }

        return $resultArray;
    }


}