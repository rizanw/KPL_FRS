<?php 

namespace Kel5\FRS\Infrastructure;

use Kel5\FRS\Domain\Model\FRSRepository;
use Kel5\FRS\Domain\Model\KelasTerpilih;
use Kel5\FRS\Domain\Model\Mahasiswa;
use Kel5\FRS\Domain\Model\Dosen;
use Kel5\FRS\Domain\Model\FRS;
use Kel5\FRS\Domain\Model\Kelas;

use Phalcon\DiInterface;
use Ramsey\Uuid\Uuid;



class SqlFRSRepository implements FRSRepository
{
    protected $di;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
    }

    public function getFrsByNrp($nrp, $periode, $tahun)
    {
        $db = $this->di->getShared('db');
        $sql = "SELECT * FROM frs WHERE nrp = :nrp AND periode = :periode AND tahun = :tahun";

        $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'nrp' => $nrp,
            'periode' => $periode,
            'tahun' => $tahun
        ]);

        if ($res) {
            $frs = new FRS(
                $res['id_frs'],
                $res['nrp'],
                $res['periode'],
                $res['tahun'],
                $res['is_setuju']
            );

            return $frs;
        } else {
            $id = Uuid::uuid4()->toString();
            $sql = "INSERT INTO frs(id_frs, nrp, is_setuju, periode, tahun)
                        VALUES(:id, :nrp, :is_setuju, :periode, :tahun)";

            $ex = $db->query($sql, [
                'id' => $id,
                'nrp' => $nrp,
                'is_setuju' => "0",
                'periode' => $periode,
                'tahun' => $tahun
            ]);

           if($ex) {
               $frs = new FRS(
                   $id,
                   $nrp,
                   $periode,
                   $tahun,
                   '0'
               );
               return $frs;
           }
            return null;
        }
    }

    public function getMahasiswaByNrp($nrp)
    {
        $db = $this->di->getShared('db');
        $sql = "SELECT * FROM mahasiswa WHERE nrp = :nrp";

        $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'nrp' => $nrp
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
                $res['nrp'],
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
        $res = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [
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
                    $r['nrp'],
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

    public function addKelasTerpilih(KelasTerpilih $kelasTerpilih)
    {
        $db = $this->di->getShared('db');

        $sql = "SELECT * FROM kelasterpilih WHERE id_frs = :id_frs AND id_kelas = :id_kelas AND nrp = :nrp";

        $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'id_frs' => $kelasTerpilih->getIdFrs(),
            'id_kelas' => $kelasTerpilih->getIdKelas(),
            'nrp' => $kelasTerpilih->getNrp()
        ]);

        if(!$res){
            $sql = "INSERT INTO kelasterpilih(id, id_frs, id_kelas, nrp)
                VALUES (:id, :id_frs, :id_kelas, :nrp)";

            $db->query($sql, [
                'id_kelas' => Uuid::uuid4()->toString(),
                'id_frs' => $kelasTerpilih->getIdFrs(),
                'id_kelas' => $kelasTerpilih->getIdKelas(),
                'nrp' => $kelasTerpilih->getNrp()
            ]);
        }
    }

    public function getKelasTerpilih(FRS $frs)
    {
        $db =  $this->di->getShared('db');

        $sql = "SELECT * FROM kelasterpilih WHERE nrp = :nrp";
        $res = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [
            'nrp' => $frs->getNrp()
        ]);

        $daftarKelas = array();

        foreach ($res as $r){
            $sql = "SELECT * FROM kelas WHERE id_kelas = :id_kelas";
            $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
                'id_kelas' => $r['id_kelas'],
            ]);

            $sql = "SELECT * FROM dosen WHERE nip = :nip";
            $dosen = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
                'nip' => $res['dosen'],
            ]);

            $kelas = new Kelas(
                $res['id_kelas'],
                $res['mata_kuliah'],
                $res['kode_matkul'],
                $res['sks'],
                $res['grup'],
                $res['kapasitas'],
                $res['dosen'],
                $res['ruang'],
                $res['Waktu_mulai'],
                $res['waktu_selesai'],
                $res['periode'],
                $res['tahun'],
                $dosen['nama']
            );

            array_push($daftarKelas, $kelas);
        }

        return $daftarKelas;
    }

    public function confirmFrs($idFrs)
    {
        $db =  $this->di->getShared('db');

        $sql = "UPDATE frs SET is_setuju = 1 WHERE id_frs = :id_frs";

        $db->query($sql, [
            'id_frs' => $idFrs,
        ]);
    }

    public function dropKelas($idKelas)
    {
        $db =  $this->di->getShared('db');

        $sql = "DELETE FROM kelasterpilih WHERE id_kelas = :id_kelas";

        $db->query($sql, [
            'id_kelas' => $idKelas,
        ]);
    }


    public function getKelasByDosen($nip): array
    {
        $db = $this->di->getShared('db');
        $sql = "select * from kelas where dosen = :nip";
        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [
            'nip' => $nip
        ]);
        $resultArray= array();

        foreach($result as $row) {
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

    public function getPeserta($id_kelas): array
    {

    }
}