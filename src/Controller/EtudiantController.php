<?php

namespace App\Controller;

use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiants', name: 'app_etudiant_liste')]
    public function list( EtudiantRepository $etudiantRepository): Response
    {
        // Appel au modèle
        // Le contrôleur va demander au modèle la liste des étudiants
        $etudiants = $etudiantRepository->findAll();


        // Appel à la vue
        return $this->render('etudiant/index.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }

    #[Route('/etudiants/{id}', name: 'app_etudiant_info', requirements: ['id' => '\d+'])]
    public function etudiant( EtudiantRepository $etudiantRepository, int $id): Response
    {
        // Appel au modèle
        $etudiant = $etudiantRepository->find($id);

        // Appel à la vue
        return $this->render('etudiant/etudiant.html.twig',[
            "etudiant" => $etudiant,
        ]);
    }

    #[Route('/etudiants/mineurs', name: 'app_etudiant_mineurs_liste')]
    public function listMineurs ( EtudiantRepository $etudiantRepository): Response
    {
        // Appel au modèle

        $etudiants = $etudiantRepository->findMineurs();


        // Appel à la vue
        return $this->render('etudiant/index.html.twig',[
            "etudiants" => $etudiants,
        ]);
    }





}
