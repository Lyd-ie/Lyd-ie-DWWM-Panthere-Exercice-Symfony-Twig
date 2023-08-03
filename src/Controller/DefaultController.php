<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Team;
use App\Entity\Position;


class DefaultController extends AbstractController
{
    // envoie les informations de l'entité et du repository Team dans le template Twig "index"
    #[Route('/default', name: 'app_default')]
    public function index(EntityManagerInterface $em): Response
    {
        // récupère tous les résultats dans la table Team
        $team = $em->getRepository(Team::class)->findAll();
        
        // renvoie ces résultats sous la forme d'un tableau de tableaux associatifs vers la page "default/index"
        return $this->render('default/index.html.twig', [
            'team' => $team,
        ]);
    }

    // envoie les informations de Team selon l'id donné en url vers le template Twig "profile"
    #[Route('/profile/{id}', name: 'app_profile')]
    public function profile(EntityManagerInterface $em, int $id): Response
    {
        // récupère l'id en url et effectue une recherche selon celui-ci
        $team = $em->getRepository(Team::class)->findOneBy(["id" => $id]);

        // renvoie ces résultats sous la forme d'un tableau vers la page "profile"
        return $this->render('default/profile.html.twig', [
            'teammate' => $team,
        ]);
    }
}