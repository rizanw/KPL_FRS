<?php


namespace Kel5\FRS\Application;


use Kel5\FRS\Domain\Model\FRSRepository;

class ViewPesertaKelasService
{
    private $frsRepository;

    /**
     * MenampilkanKelas constructor.
     * @param $frsRepository
     */
    public function __construct(FRSRepository $frsRepository)
    {
        $this->frsRepository = $frsRepository;
    }

    public function execute($idKelas)
    {
        $kelas = $this->frsRepository->getKelasById($idKelas);
        $peserta = $this->frsRepository->getPesertaKelas($idKelas);
        $response = new ViewPesertaKelasResponse();

        $response->addKelas(
            $kelas->getNamaMataKuliah(),
            $kelas->getKodeMataKuliah(),
            $kelas->getSks(),
            $kelas->getGrup(),
            $kelas->getRuang(),
            $kelas->getKapasitas(),
            $kelas->getDosen()->getNama(),
            $kelas->getHari(),
            $kelas->getWaktuMulai(),
            $kelas->getWaktuSelesai()
        );

        if($peserta) {
            foreach ($peserta as $row){
                $response->tambahPeserta(
                    $row->getNrp()->getNrp(),
                    $row->getNama()
                );
            }
        }

        return $response;
    }
}