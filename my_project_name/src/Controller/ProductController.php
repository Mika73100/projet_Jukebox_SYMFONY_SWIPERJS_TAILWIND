<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/playlist', name: 'app_product')]
    public function index(): Response
    {

        $product = $this->entityManager->getRepository(Product::class)->findAll();


        
        return $this->render('product/index.html.twig', [
            'products' => $product,
        ]);
    }


    #[Route('addFavoris/{id}', name: 'addFavoris')]
    public function addFavoris(Product $sound, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser();
        $sound->addFavori($user);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_product');
    }


    #[Route('suppfav/{id}', name: 'suppfav')]
    public function suppfav(Product $sound, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $sound->removeFavori($user);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_product');
    }
}
