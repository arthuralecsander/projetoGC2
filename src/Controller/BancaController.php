<?php

namespace App\Controller;

use App\Entity\Tbbanca;
use App\Form\TbbancaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/banca')]
class BancaController extends AbstractController
{
    #[Route('/', name: 'banca_index', methods: ['GET'])]
    public function index(): Response
    {
        $tbbancas = $this->getDoctrine()
            ->getRepository(Tbbanca::class)
            ->findAll();

        return $this->render('banca/index.html.twig', [
            'tbbancas' => $tbbancas,
        ]);
    }

    #[Route('/new', name: 'banca_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $tbbanca = new Tbbanca();
        $form = $this->createForm(TbbancaType::class, $tbbanca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tbbanca);
            $entityManager->flush();

            return $this->redirectToRoute('banca_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('banca/new.html.twig', [
            'tbbanca' => $tbbanca,
            'form' => $form,
        ]);
    }

    #[Route('/{idbanca}', name: 'banca_show', methods: ['GET'])]
    public function show(Tbbanca $tbbanca): Response
    {
        return $this->render('banca/show.html.twig', [
            'tbbanca' => $tbbanca,
        ]);
    }

    #[Route('/{idbanca}/edit', name: 'banca_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tbbanca $tbbanca): Response
    {
        $form = $this->createForm(TbbancaType::class, $tbbanca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('banca_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('banca/edit.html.twig', [
            'tbbanca' => $tbbanca,
            'form' => $form,
        ]);
    }

    #[Route('/{idbanca}', name: 'banca_delete', methods: ['POST'])]
    public function delete(Request $request, Tbbanca $tbbanca): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tbbanca->getIdbanca(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tbbanca);
            $entityManager->flush();
        }

        return $this->redirectToRoute('banca_index', [], Response::HTTP_SEE_OTHER);
    }
}
