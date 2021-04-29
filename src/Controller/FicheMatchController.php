<?php

namespace App\Controller;

use App\Entity\FicheMatch;
use App\Form\FicheMatchType;
use App\Repository\FicheMatchRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/feuille_match")
 */
class FicheMatchController extends AbstractController
{
    /**
     * @Route("/", name="fiche_match_index", methods={"GET"})
     */
    public function index(FicheMatchRepository $ficheMatchRepository): Response
    {
        return $this->render('fiche_match/index.html.twig', [
            'fiche_matches' => $ficheMatchRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fiche_match_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ficheMatch = new FicheMatch();
        $form = $this->createForm(FicheMatchType::class, $ficheMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ficheMatch);
            $entityManager->flush();

            return $this->redirectToRoute('fiche_match_index');
        }

        return $this->render('fiche_match/new.html.twig', [
            'fiche_match' => $ficheMatch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_match_show", methods={"GET"})
     */
    public function show(FicheMatch $ficheMatch): Response
    {
        return $this->render('fiche_match/show.html.twig', [
            'fiche_match' => $ficheMatch,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fiche_match_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FicheMatch $ficheMatch): Response
    {
        $form = $this->createForm(FicheMatchType::class, $ficheMatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_match_index');
        }

        return $this->render('fiche_match/edit.html.twig', [
            'fiche_match' => $ficheMatch,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_match_delete", methods={"POST"})
     */
    public function delete(Request $request, FicheMatch $ficheMatch): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficheMatch->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ficheMatch);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fiche_match_index');
    }
}
