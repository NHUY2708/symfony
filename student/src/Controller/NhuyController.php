<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\Type\ProductForm;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NhuyController extends AbstractController
{
    /**
     * @Route("/nhuy", name="nhuy")
     */
    public function index(Request $request)
    {
        $Product = new Product();

        $form = $this->createForm(ProductForm::class, $Product);
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
 
            $Product = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($Product);
            $em->flush();
            return $this->redirectToRoute('nhuy');
        }
        return $this->render('nhuy/index.html.twig', [
            'controller_name' => 'NhuyController',
            'form' => $form->createView(),
        ]);
    }
}
