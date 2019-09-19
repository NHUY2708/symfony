<?php

namespace App\Controller;
use App\Entity\Product;
use App\Entity\Task;
use App\Form\Type\TaskType;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
//        $task = new Task();
//
        $nhuy = "bien controlle";
//        $form = $this->createFosrm(TaskType::class, $task);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//
//            $task = $form->getData();
//            return $this->redirectToRoute('nhuy');
//        }
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findAll();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
//            'form' => $form->createView(),
            'nhuy' => $nhuy,
            'products' => $products,
        ]);
    }
}

