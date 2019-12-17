<?php

namespace Kel5\FRS\Application;

use Kel5\FRS\Domain\Model\FRSRepository;

class ViewAnakWaliService
{
    private $frsRepository;

    public function __construct(FRSRepository $frsRepository)
    {
        $this->frsRepository = $frsRepository;
    }

    public function execute($dosenNip)
    {
        $anakWalis = $this->frsRepository->getAnakWaliByNip($dosenNip);

        $response = new ViewAnakWaliResponse();

        if ($anakWalis) {
            foreach ($anakWalis as $r) {
                $response->addAnakWaliResponse(
                    $r->getNrp(),
                    $r->getNama(),
                    $r->getIpk(),
                    $r->getDoswal()->getNip(),
                    $r->getAlamat()
                );
            }
        }

        return $response;
    }
}