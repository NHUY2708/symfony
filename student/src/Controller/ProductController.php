<?php

namespace App\Controller;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class ProductController extends AbstractController
{
    /**
     * @Route("/san-pham", name="product")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findAll();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products,
        ]);
    }
    /**
     * @Route("/san-pham/{id}", name="detail", methods={"GET","HEAD"})
     */
    public function detail(int $id){
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $product = $repository->find($id);
        return $this->render('product/detail.html.twig', [
            'product' => $product,
        ]);
    }
}

