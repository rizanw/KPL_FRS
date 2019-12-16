<?php

namespace Kel5\FRS\Domain\Model;

interface FRSRepository
{
    public function ambilKelasUpmb() : array;
    public function ambilKelasDept() : array;
}
