<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Entity\Color;
use App\Entity\Shoe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShoeController extends AbstractController
{
    #[Route('/shoe/{id}', name: 'app_shoe')]
    public function index(int $id, EntityManagerInterface $em): Response
    {

        $shoes = $em->getRepository(Shoe::class)->findAll();

        return $this->render('shoe/shoe.html.twig',
        ["id" => $id, "shoes" => $shoes]
    );
    }
}
