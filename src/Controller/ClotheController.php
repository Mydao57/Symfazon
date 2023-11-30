<?php

namespace App\Controller;

use App\Entity\Clothe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClotheController extends AbstractController
{
    #[Route('/clothes', name: 'all_clothes')]
    public function showAllShoes(EntityManagerInterface $em): Response {

        $allClothes = $em->getRepository(Clothe::class)->findAll();

        return $this->render(
            'clothe/allclothes.html.twig',
            ['clothes' => $allClothes]
        );
    }


    #[Route('/clothe/{id}', name: 'app_clothe')]
    public function index(int $id, EntityManagerInterface $em): Response
    {

        $clothes = $em->getRepository(Clothe::class)->findAll();

        return $this->render('clothe/clothe.html.twig',
            ["id" => $id, "clothes" => $clothes]
        );
    }
}
