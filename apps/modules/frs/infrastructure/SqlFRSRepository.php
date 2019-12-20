<?php 

namespace Kel5\FRS\Infrastructure;

use Kel5\FRS\Domain\Model\FRSRepository;
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

    public function getFrsById($idFrs): ?FRS
    {
        $db = $this->di->getShared('db');
        $sql = "SELECT * FROM frs WHERE id = :id";

        $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'id' => $idFrs
        ]);

        $mahasiswaNrp = new MahasiswaNrp($res['nrp']);
        $mahasiswa = $this->getMahasiswaByNrp($mahasiswaNrp);

        if ($res) {
            $frs = new FRS(
                $res['id'],
                $mahasiswa,
                $res['periode'],
                $res['tahun'],
                $res['is_setuju']
            );

            $this->getKelasTerpilih($frs);

            return $frs;
        }
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
        $sql = "SELECT * FROM mahasiswa WHERE id_dosen = :nip";
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

    public function addKelasTerpilih(FRS $frs, Kelas $kelas)
    {
        $db = $this->di->getShared('db');

        /*
         * Check Apakah melebih batas sks?
         */
        if ($frs->checkBatasSKs()){
            /*
             * Check Apakah kelas sudah di masukkan?
             */
            if ($frs->addKelas($kelas)){
            $sql = "INSERT INTO kelasterpilih(id, id_frs, id_kelas, nrp)
                VALUES (:id, :id_frs, :id_kelas, :nrp)";

            $db->query($sql, [
                'id' => Uuid::uuid4()->toString(),
                'id_frs' => $frs->getId(),
                'id_kelas' => $kelas->getId(),
                'nrp' => $frs->getMahasiswa()->getNrp()->getNrp()
            ]);

            return true;
            }
        }
        return false;
    }

    public function getKelasTerpilih(FRS $frs)
    {
        $db =  $this->di->getShared('db');

        $sql = "SELECT * FROM kelasterpilih WHERE nrp = :nrp";
        $res = $db->fetchAll($sql, \Phalcon\Db::FETCH_ASSOC, [
            'nrp' => $frs->getMahasiswa()->getNrp()->getNrp()
        ]);

        foreach ($res as $r){
            $kelas = $this->getKelasById($r['id_kelas']);
            $frs->addKelas($kelas);
        }

        $daftarKelas = $frs->getKelasTerpilih();

        return $daftarKelas;
    }

    public function confirmFrs($idFrs)
    {
        $db =  $this->di->getShared('db');

        $sql = "UPDATE frs SET is_setuju = 1 WHERE id = :id_frs";

        $db->query($sql, [
            'id_frs' => $idFrs,
        ]);
    }

    public function cancelFrs($idFrs)
    {
        $db =  $this->di->getShared('db');

        $sql = "UPDATE frs SET is_setuju = 0 WHERE id = :id_frs";

        $db->query($sql, [
            'id_frs' => $idFrs,
        ]);
    }

    public function dropKelas($idKelas)
    {
        $db =  $this->di->getShared('db');

        $sql = "DELETE FROM kelasterpilih WHERE id_kelas = :id_kelas";

        $res = $db->query($sql, [
            'id_kelas' => $idKelas,
        ]);

        if($res){
            return true;
        }
        return false;
    }

    public function getKelasById($id) : ?Kelas
    {
        $db =  $this->di->getShared('db');

        $sql = "SELECT * FROM kelas WHERE id = :id_kelas";
        $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'id_kelas' => $id
        ]);

        $dosen = $this->getDosenByNip($res['nip_dosen']);

        $kelas = new Kelas(
            $res['id'],
            $res['mata_kuliah'],
            $res['kode_matkul'],
            $res['sks'],
            $res['grup'],
            $res['kapasitas'],
            $res['ruang'],
            $res['waktu_mulai'],
            $res['waktu_selesai'],
            $res['periode'],
            $res['tahun'],
            $dosen
        );

        return $kelas;
    }

    public function getDosenByNip($nip) : ?Dosen
    {
        $db =  $this->di->getShared('db');

        $sql = "SELECT * FROM dosen WHERE nip = :nip";
        $res = $db->fetchOne($sql, \Phalcon\Db::FETCH_ASSOC, [
            'nip' => $nip
        ]);

        $dosen = new Dosen(
            $res['nip'],
            $res['nama']
        );

        return $dosen;
    }

    public function updateKelasKapasitas(Kelas $kelas, $isDrop)
    {
        $db =  $this->di->getShared('db');
        $sql = "UPDATE kelas SET kapasitas = :kapasitas WHERE id = :id_kelas";

        $res = $db->query($sql, [
            'kapasitas' => $kelas->updateKapasitas($isDrop),
            'id_kelas' => $kelas->getId()
        ]);

        return $res;
    }

    public function getPesertaKelas($idKelas)
    {
        $db =  $this->di->getShared('db');
        $sql = "SELECT * FROM kelasterpilih WHERE id_kelas = :id_kelas";
        
    }
}