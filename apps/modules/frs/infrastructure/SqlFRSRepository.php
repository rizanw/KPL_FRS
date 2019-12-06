<?php 

namespace Kel5\FRS\Infrastructure;

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


}