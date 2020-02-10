<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InicioController extends AbstractController
{
    /**
     * @Route("/", name="inicio")
     */
    public function index()
    {
        return $this->render('inicio/index.html.twig', [
            'controller_name' => 'InicioController',
        ]);
    }
}
