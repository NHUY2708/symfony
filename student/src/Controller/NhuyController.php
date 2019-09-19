<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NhuyController extends AbstractController
{
    /**
     * @Route("/nhuy", name="nhuy")
     */
    public function index()
    {
        return $this->render('nhuy/index.html.twig', [
            'controller_name' => 'NhuyController',
        ]);
    }
}
