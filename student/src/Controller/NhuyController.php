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
     * @Route("/them-san-pham", name="nhuy")
     */
    public function index(Request $request)
    {
        $product = new Product();

        $form = $this->createForm(ProductForm::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $product = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            alert("Thêm sản phẩm thành công");

        }
        return $this->render('nhuy/index.html.twig', [
            'controller_name' => 'NhuyController',
            'form' => $form->createView(),
        ]);
    }
}
