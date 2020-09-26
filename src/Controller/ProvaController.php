<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProvaController extends AbstractController
{
    /**
     * @Route("/prova-twig/{name?}", name="prova-twig")
     */
    public function index($name)
    {
        return $this->render('/prova-twig.html.twig', [
            'name' =>  $name,
        ]);
    }
}