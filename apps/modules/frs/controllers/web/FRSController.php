<?php

namespace Kel5\FRS\Controllers\Web;

use Phalcon\Mvc\Controller;

class FrsController extends Controller
{
    public function indexAction()
    {
         return $this->view->pick('dosen/anak_wali');
    }
}