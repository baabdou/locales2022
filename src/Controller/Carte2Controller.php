<?php

namespace App\Controller;

use App\Entity\Carte2;
use App\Form\Carte2Type;
use App\Repository\Carte2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/carte2")
 */
class Carte2Controller extends AbstractController
{
    /**
     * @Route("/", name="carte2_index", methods={"GET"})
     */
    public function index(Carte2Repository $carte2Repository): Response
    {
        /*
        return $this->render('carte2/index.html.twig', [
            'carte2s' => $carte2Repository->findAll(),
        ]);
        */

        return $this->render('carte2/index.html.twig', [
                    'carte2s' => $carte2Repository->findBy(array(), array('id' => 'ASC'), 1000, 0),
                ]);
    }

    /**
     * @Route("/new", name="carte2_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $carte2 = new Carte2();
        $form = $this->createForm(Carte2Type::class, $carte2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($carte2);
            $entityManager->flush();

            return $this->redirectToRoute('carte2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carte2/new.html.twig', [
            'carte2' => $carte2,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="carte2_show", methods={"GET"})
     */
    public function show(Carte2 $carte2): Response
    {
        return $this->render('carte2/show.html.twig', [
            'carte2' => $carte2,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="carte2_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Carte2 $carte2): Response
    {
        $form = $this->createForm(Carte2Type::class, $carte2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('carte2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carte2/edit.html.twig', [
            'carte2' => $carte2,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="carte2_delete", methods={"POST"})
     */
    public function delete(Request $request, Carte2 $carte2): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carte2->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($carte2);
            $entityManager->flush();
        }

        return $this->redirectToRoute('carte2_index', [], Response::HTTP_SEE_OTHER);
    }


    /**
     * @Route("/localite/liste/{nom}", name="carte2_localite", methods={"GET"})
    */
    public function localite(Request $request, Carte2Repository $carte2Repository): Response{
        //var_dump($request->get('nom'));exit();
        $localite = $request->get('nom');
        if ($localite == "commune")
            return $this->render('carte2/commune.html.twig', [
                'carte2s' => $carte2Repository->findCommune(),
            ]);
        else if ($localite == "ville")
            return $this->render('carte2/ville.html.twig', [
                'carte2s' => $carte2Repository->findVille(),
            ]);
        else if ($localite == "departement")
            return $this->render('carte2/departement.html.twig', [
                'carte2s' => $carte2Repository->findDepartement(),
            ]);
    }



//    /**
//     * @Route("/liste/departement", name="carte2_departement", methods={"GET"})
//    */
//    public function departement(Carte2Repository $carte2Repository): Response{
//        //var_dump($carte2Repository->findDepartement());
//        //exit();
//
//        return $this->render('carte2/departement.html.twig', [
//            'carte2s' => $carte2Repository->findDepartement(),
//        ]);
//    }
//
//    /**
//     * @Route("/liste/ville", name="carte2_departement", methods={"GET"})
//    */
//    public function ville(Carte2Repository $carte2Repository): Response{
//        return $this->render('carte2/ville.html.twig', [
//            'carte2s' => $carte2Repository->findVille(),
//        ]);
//    }
//
//
//    /**
//     * @Route("/liste/commune", name="carte2_departement", methods={"GET"})
//    */
//    public function commune(Carte2Repository $carte2Repository): Response{
//        return $this->render('carte2/commune.html.twig', [
//            'carte2s' => $carte2Repository->findCommune(),
//        ]);
//    }


}
