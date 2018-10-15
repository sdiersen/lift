<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LiftController extends AbstractController
{
    /**
     * @Route("/", name="lift_homepage")
     */
    public function index()
    {
        return $this->render('lift/index.html.twig', [
            'controller_name' => 'LiftController',
        ]);
    }
}
