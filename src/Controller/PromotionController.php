<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PromotionController extends AbstractController
{
    #[Route('/promotions', name: 'app_promotion_liste')]
    public function list( PromotionRepository $promotionRepository): Response
    {
        $promotions = $promotionRepository->findAll();

        return $this->render('promotion/index.html.twig', [
            'promotions' => $promotions,
        ]);
    }

    #[Route('/promotions/{id}', name: 'app_promotion_info', requirements: ['id' => '\d+'])]
    public function promotion( PromotionRepository $promotionRepository, EtudiantRepository $etudiantRepository ,int $id): Response
    {
        // Appel au modèle
        $promotion = $promotionRepository->find($id);
        /*$listeEtudiants =  $etudiantRepository->findBy(array(   = $id));*/

        // Appel à la vue
        return $this->render('promotion/promotion.html.twig',[
            "promotion" => $promotion,
        ]);
    }






}
