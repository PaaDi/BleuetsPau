<?php

namespace App\Controller;

use App\Entity\FicheMatch;
use App\Repository\ArticleRepository;
use App\Repository\FicheMatchRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(FicheMatchRepository $ficheMatchRepository, ArticleRepository $articleRepository): Response
    {
        $ficheMatchs = $ficheMatchRepository -> findAll();
        $Articles = $articleRepository -> findAll();
        return $this->render('main/index.html.twig', [
            'fiche_matches' => $ficheMatchs,
            'Articles' => $Articles,
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/admin", name="admin_panel")
     * @IsGranted("ROLE_ADMIN")
     */
    public function adminPanel()
    {
        return $this->render("admin/admin_home.html.twig", [

        ]);
    }
}
