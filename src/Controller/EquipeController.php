<?php

namespace App\Controller;

use App\Datatables\EquipeDatatable;
use Sg\DatatablesBundle\Datatable\DatatableFactory;
use Sg\DatatablesBundle\Response\DatatableResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Equipe;
use App\Form\EquipeType;
use App\Repository\EquipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/equipe")
 * @IsGranted("ROLE_USER")
 */
class EquipeController extends AbstractController
{
    /**
     * @Route("/", name="equipe_index", methods={"GET"})
     */
    public function index(EquipeRepository $equipeRepository): Response
    {

        return $this->render('equipe/index.html.twig', [
            'equipes' => $equipeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="equipe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $equipe = new Equipe();
        $form = $this->createForm(EquipeType::class, $equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $file = $form->get('imageUpload')->getData();
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            // moves the file to the directory where brochures are stored
            $file->move(
            $this->getParameter('image'),
            $fileName
            );

            // updates the 'equipe' property to store the PDF file name
            // instead of its contents
            $equipe->setImage($fileName);

            $entityManager->persist($equipe);
            $entityManager->flush();


            return $this->redirectToRoute('equipe_index');
        }

        return $this->render('equipe/new.html.twig', [
            'equipe' => $equipe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="equipe_show", methods={"GET"})
     */
    public function show(Equipe $equipe): Response
    {
        return $this->render('equipe/show.html.twig', [
            'equipe' => $equipe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="equipe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Equipe $equipe): Response
    {
        $form = $this->createForm(EquipeType::class, $equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('imageUpload')->getData();
            $fileName = $this->generateUniqueFileName().'.'.$file->guessExtension();
            // moves the file to the directory where brochures are stored
            $file->move(
            $this->getParameter('image'),
            $fileName
            );

            // updates the 'equipe' property to store the PDF file name
            // instead of its contents
            $equipe->setImage($fileName);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('equipe_index');
        }

        return $this->render('equipe/edit.html.twig', [
            'equipe' => $equipe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="equipe_delete", methods={"POST"})
     */
    public function delete(Request $request, Equipe $equipe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($equipe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('equipe_index');
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

}
