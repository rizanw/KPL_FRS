<?php 

namespace Kel5\FRS\Infrastructure;

use Kel5\FRS\Domain\Model\Kelas;
use Phalcon\DiInterface;

use Kel5\FRS\Domain\Model\FRSRepository;
use Kel5\FRS\Domain\Model\Mahasiswa;
use Kel5\FRS\Domain\Model\Dosen;
use Kel5\FRS\Domain\Model\mahasiswaNrp;

use Phalcon\DiInterface;


class SqlFRSRepository implements FRSRepository
{
    protected $di;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
    }

    public function getMahasiswaByNrp(MahasiswaNrp $nrp): ?Mahasiswa
    {
        $db = $this->di->getShared('db');
    public function ambilKelasDept() : array
    {
        $db =  $this->di->getShared('db');
        $sql = "Select * from kelas inner join dosen ON dosen.nip = kelas.dosen where is_upmb = 0";

        $sql = "SELECT * FROM mahasiswa WHERE nrp = :nrp";

        $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'nrp' => $nrp->getNrp()
        ]);

        if($res) {

            $sql = "SELECT * FROM dosen WHERE nip = :nip";
            $res1 = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
                'nip' => $res['doswal']
            ]);

            $doswal = new Dosen(
                $res1['nip'],
                $res1['nama']
            );

            $mahasiswa = new Mahasiswa(
                new MahasiswaNrp($res['nrp']),
                $res['nama'],
                $res['IPK'],
                $doswal,
                $res['alamat']
            );

            return $mahasiswa;
        }

        return null;
    }

    public function getAnakWaliByNip($nip)
    {
        $db = $this->di->getShared('db');
        $sql = "SELECT * FROM mahasiswa WHERE doswal = :nip";
        $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'nip' => $nip
        ]);

        if($res){
            $resultArray = array();

            foreach ($res as $r){
                $sql = "SELECT * FROM dosen WHERE nip = :nip";
                $res1 = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
                    'nip' => $r['doswal']
                ]);

                $doswal = new Dosen(
                    $res1['nip'],
                    $res1['nama']
                );

                $mahasiswa = new Mahasiswa(
                    new MahasiswaNrp($r['nrp']),
                    $r['nama'],
                    $r['IPK'],
                    $doswal,
                    $r['alamat']
                );

                array_push($resultArray, $mahasiswa);
            }

            return $resultArray;
        }
        return null;
    }
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