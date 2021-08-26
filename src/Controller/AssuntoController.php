<?php

namespace App\Controller;

use App\Entity\Tbassunto;
use App\Form\TbassuntoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/assunto')]
class AssuntoController extends AbstractController
{
    #[Route('/', name: 'assunto_index', methods: ['GET'])]
    public function index(): Response
    {
        $tbassuntos = $this->getDoctrine()
            ->getRepository(Tbassunto::class)
            ->findAll();

        return $this->render('assunto/index.html.twig', [
            'tbassuntos' => $tbassuntos,
        ]);
    }

    #[Route('/new', name: 'assunto_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $tbassunto = new Tbassunto();
        $form = $this->createForm(TbassuntoType::class, $tbassunto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tbassunto);
            $entityManager->flush();

            return $this->redirectToRoute('assunto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('assunto/new.html.twig', [
            'tbassunto' => $tbassunto,
            'form' => $form,
        ]);
    }

    #[Route('/{idassunto}', name: 'assunto_show', methods: ['GET'])]
    public function show(Tbassunto $tbassunto): Response
    {
        return $this->render('assunto/show.html.twig', [
            'tbassunto' => $tbassunto,
        ]);
    }

    #[Route('/{idassunto}/edit', name: 'assunto_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tbassunto $tbassunto): Response
    {
        $form = $this->createForm(TbassuntoType::class, $tbassunto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('assunto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('assunto/edit.html.twig', [
            'tbassunto' => $tbassunto,
            'form' => $form,
        ]);
    }

    #[Route('/{idassunto}', name: 'assunto_delete', methods: ['POST'])]
    public function delete(Request $request, Tbassunto $tbassunto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tbassunto->getIdassunto(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tbassunto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('assunto_index', [], Response::HTTP_SEE_OTHER);
    }




}

