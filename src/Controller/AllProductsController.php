<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllProductsController extends AbstractController
{
    #[Route('/allProducts', name: 'all_products')]
    public function index(): Response
    {
        return $this->render('all_products/allProducts.html.twig', [
            'controller_name' => 'AllProductsController',
        ]);
    }
}
