<?php


namespace Kel5\FRS\Controllers\Web;
use Phalcon\Mvc\Controller;

class ClassController extends Controller
{
    public function PesertaAction()
    {
         return $this->view->pick('kelas');
    }
}