<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClotheController extends AbstractController
{
    #[Route('/clothes', name: 'all_clothes')]
    public function showAllClothes(): Response
    {
        return $this->render('clothe/allClothes.html.twig');
    }
}
