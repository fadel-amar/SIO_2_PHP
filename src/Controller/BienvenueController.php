<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienvenueController extends AbstractController
{
    #[Route('/bienvenue', name: 'app_bienvenue')]
    public function bienvenue(): Response
    {

        // Appel "simulé" au modèle
        $prenom = 'dembele';

        // Appel à la vue
        return $this->render('bienvenue/index.html.twig',[
            "prenom" => $prenom
        ]);
    }
}
