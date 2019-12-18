<?php 

namespace Kel5\FRS\Infrastructure;

use Kel5\FRS\Domain\Model\FRSRepository;
use Kel5\FRS\Domain\Model\KelasTerpilih;
use Kel5\FRS\Domain\Model\Mahasiswa;
use Kel5\FRS\Domain\Model\Dosen;
use Kel5\FRS\Domain\Model\FRS;
use Kel5\FRS\Domain\Model\Kelas;

use Kel5\FRS\Domain\Model\MahasiswaNrp;
use Phalcon\DiInterface;
use Ramsey\Uuid\Uuid;


class SqlFRSRepository implements FRSRepository
{
    protected $di;

    public function __construct(DiInterface $di)
    {
        $this->di = $di;
    }

    public function getFrsByNrp(MahasiswaNrp $mahasiswaNrp, $periode, $tahun) : ?FRS
    {
        $db = $this->di->getShared('db');
        $sql = "SELECT * FROM frs WHERE nrp = :nrp AND periode = :periode AND tahun = :tahun";

        $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'nrp' => $mahasiswaNrp->getNrp(),
            'periode' => $periode,
            'tahun' => $tahun
        ]);

        $mahasiswa = $this->getMahasiswaByNrp($mahasiswaNrp);

        if ($res) {
            $frs = new FRS(
                $res['id'],
                $mahasiswa,
                $res['periode'],
                $res['tahun'],
                $res['is_setuju']
            );

            return $frs;
        } else {
            $id = Uuid::uuid4()->toString();
            $sql = "INSERT INTO frs(id_frs, nrp, is_setuju, periode, tahun)
                        VALUES(:id, :nrp, :is_setuju, :periode, :tahun)";

            $newFrsQuery = $db->query($sql, [
                'id' => $id,
                'nrp' => $mahasiswaNrp->getNrp(),
                'is_setuju' => "0",
                'periode' => $periode,
                'tahun' => $tahun
            ]);

           if($newFrsQuery) {
               $newFrs = new FRS(
                   $id,
                   $mahasiswa,
                   $periode,
                   $tahun,
                   '0'
               );
               return $newFrs;
           }

            return null;
        }
    }

    public function getMahasiswaByNrp(MahasiswaNrp $mahasiswaNrp) : ?Mahasiswa
    {
        $db = $this->di->getShared('db');
        $sql = "SELECT * FROM mahasiswa WHERE nrp = :nrp";

        $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'nrp' => $mahasiswaNrp->getNrp()
        ]);

        if($res) {
            $sql = "SELECT * FROM dosen WHERE nip = :nip";
            $res1 = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
                'nip' => $res['id_dosen']
            ]);

            $doswal = new Dosen(
                $res1['nip'],
                $res1['nama']
            );

            $mahasiswa = new Mahasiswa(
                new MahasiswaNrp($res['nrp']),
                $res['nama'],
                $res['ipk'],
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
        $sql = "Select * from kelas where is_upmb = 0";
        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);
        $resultArray= array();

        foreach($result as $row)
        {
            $sql = "Select * from dosen where nip = :nip";
            $result = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
                'nip' => $row['nip_dosen']
            ]);

            $dosen = new Dosen(
                $result['nip'],
                $result['nama']
            );

            $kelas = new Kelas(
                $row['id'],
                $row['mata_kuliah'],
                $row['kode_matkul'],
                $row['sks'],
                $row['grup'],
                $row['kapasitas'],
                $row['ruang'],
                $row['waktu_mulai'],
                $row['waktu_selesai'],
                $row['periode'],
                $row['tahun'],
                $dosen
            );
            array_push($resultArray, $kelas);
        }

        return $resultArray;
    }

    public function ambilKelasUpmb() : array
    {
        $db =  $this->di->getShared('db');
        $sql = "Select * from kelas where is_upmb = 1";
        $result = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC);
        $resultArray= array();

        foreach($result as $row)
        {
            $sql = "Select * from dosen where nip = :nip";
            $result = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
                'nip' => $row['nip_dosen']
            ]);

            $dosen = new Dosen(
                $result['nip'],
                $result['nama']
            );

            $kelas = new Kelas(
                $row['id'],
                $row['mata_kuliah'],
                $row['kode_matkul'],
                $row['sks'],
                $row['grup'],
                $row['kapasitas'],
                $row['ruang'],
                $row['waktu_mulai'],
                $row['waktu_selesai'],
                $row['periode'],
                $row['tahun'],
                $dosen
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
                'id' => Uuid::uuid4()->toString(),
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
            $sql = "SELECT * FROM kelas WHERE id = :id_kelas";
            $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
                'id_kelas' => $r['id_kelas'],
            ]);

            $sql = "SELECT * FROM dosen WHERE nip = :nip";
            $dosen = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
                'nip' => $res['nip_dosen'],
            ]);

            $dosen = new Dosen(
                $dosen['nip'],
                $dosen['nama']
            );

            $kelas = new Kelas(
                $res['id'],
                $res['mata_kuliah'],
                $res['kode_matkul'],
                $res['sks'],
                $res['grup'],
                $res['kapasitas'],
                $res['ruang'],
                $res['Waktu_mulai'],
                $res['waktu_selesai'],
                $res['periode'],
                $res['tahun'],
                $dosen
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

    public function cancelFrs($idFrs)
    {
        $db =  $this->di->getShared('db');

        $sql = "UPDATE frs SET is_setuju = 0 WHERE id_frs = :id_frs";

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
}