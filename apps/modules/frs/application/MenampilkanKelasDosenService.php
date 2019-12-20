<?php


namespace Kel5\FRS\Application;


use Kel5\FRS\Domain\Model\FRSRepository;

class MenampilkanKelasDosenService
{
    private $frsRepository;
    private $nip;
    /**
     * MenampilkanKelas constructor.
     * @param $frsRepository
     */
    public function __construct(FRSRepository $frsRepository)
    {
        $this->frsRepository = $frsRepository;
    }

    public function execute($nip)
    {
        $kelas = $this->frsRepository->getKelasByDosen($nip);
        $response = new MenampilkanKelasResponse();

        if($kelas) {
            foreach ($kelas as $row){
                $response->tambahKelas(
                    $row->id_kelas,
                    $row->mata_kuliah,
                    $row->kode_matkul,
                    $row->sks,
                    $row->grup,
                    $row->kapasitas,
                    $row->dosen,
                    $row->ruang,
                    $row->Waktu_mulai,
                    $row->waktu_selesai,
                    $row->periode,
                    $row->tahun,
                    $row->nama_dosen
                );
            }
        }

        return $response;
    }



}