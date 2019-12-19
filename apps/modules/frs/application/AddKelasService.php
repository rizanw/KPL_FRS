<?php

namespace Kel5\FRS\Application;

use Kel5\FRS\Domain\Model\FRSRepository;
use Kel5\FRS\Domain\Model\KelasTerpilih;

class AddKelasService
{
    public $frsRepository;

    public function __construct(FRSRepository $frsRepository)
    {
        $this->frsRepository = $frsRepository;
    }

    public function execute(AddKelasRequest $request)
    {
        $frs = $this->frsRepository->getFrsById($request->idFrs);
        $kelas = $this->frsRepository->getKelasById($request->idKelas);

        $this->frsRepository->addKelasTerpilih($frs, $kelas);
    }
}