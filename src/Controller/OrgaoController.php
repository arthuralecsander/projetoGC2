<?php

namespace App\Controller;

use App\Entity\Tborgao;
use App\Form\TborgaoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/orgao')]
class OrgaoController extends AbstractController
{
    #[Route('/', name: 'orgao_index', methods: ['GET'])]
    public function index(): Response
    {
        $tborgaos = $this->getDoctrine()
            ->getRepository(Tborgao::class)
            ->findAll();

        return $this->render('orgao/index.html.twig', [
            'tborgaos' => $tborgaos,
        ]);
    }

    #[Route('/new', name: 'orgao_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $tborgao = new Tborgao();
        $form = $this->createForm(TborgaoType::class, $tborgao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tborgao);
            $entityManager->flush();

            return $this->redirectToRoute('orgao_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('orgao/new.html.twig', [
            'tborgao' => $tborgao,
            'form' => $form,
        ]);
    }

    #[Route('/{idorgao}', name: 'orgao_show', methods: ['GET'])]
    public function show(Tborgao $tborgao): Response
    {
        return $this->render('orgao/show.html.twig', [
            'tborgao' => $tborgao,
        ]);
    }

    #[Route('/{idorgao}/edit', name: 'orgao_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tborgao $tborgao): Response
    {
        $form = $this->createForm(TborgaoType::class, $tborgao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('orgao_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('orgao/edit.html.twig', [
            'tborgao' => $tborgao,
            'form' => $form,
        ]);
    }

    #[Route('/{idorgao}', name: 'orgao_delete', methods: ['POST'])]
    public function delete(Request $request, Tborgao $tborgao): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tborgao->getIdorgao(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tborgao);
            $entityManager->flush();
        }

        return $this->redirectToRoute('orgao_index', [], Response::HTTP_SEE_OTHER);
    }
}
