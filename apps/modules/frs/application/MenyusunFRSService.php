<?php
namespace Kel5\FRS\Domain\Model;

use Kel5\FRS\Domain\Model\FRSRepository;

class MenyusunFRSService
{
    private $frsRepository;

    /**
     * MenyusunFRSService constructor.
     * @param $frsRepository
     */
    public function __construct(FRSRepository $frsRepository)
    {
        $this->frsRepository = $frsRepository;
    }
    public function execute(MenyusunFRSRequest $request)
    {

    }

}