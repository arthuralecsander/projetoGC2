<?php

namespace App\Controller;

use App\Entity\Tbquestao;
use App\Form\TbquestaoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questao')]
class QuestaoController extends AbstractController
{
    #[Route('/', name: 'questao_index', methods: ['GET'])]
    public function index(): Response
    {
        $tbquestaos = $this->getDoctrine()
            ->getRepository(Tbquestao::class)
            ->findAll();


        return $this->render('questao/index.html.twig', [
            'tbquestaos' => $tbquestaos,
        ]);
    }

    #[Route('/new', name: 'questao_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $tbquestao = new Tbquestao();
        $form = $this->createForm(TbquestaoType::class, $tbquestao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tbquestao);
            $entityManager->flush();

            return $this->redirectToRoute('questao_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('questao/new.html.twig', [
            'tbquestao' => $tbquestao,
            'form' => $form,
        ]);
    }

    #[Route('/{idquestao}', name: 'questao_show', methods: ['GET'])]
    public function show(Tbquestao $tbquestao): Response
    {
        return $this->render('questao/show.html.twig', [
            'tbquestao' => $tbquestao,
        ]);
    }

    #[Route('/{idquestao}/edit', name: 'questao_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tbquestao $tbquestao): Response
    {
        $form = $this->createForm(TbquestaoType::class, $tbquestao);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('questao_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('questao/edit.html.twig', [
            'tbquestao' => $tbquestao,
            'form' => $form,
        ]);
    }

    #[Route('/{idquestao}', name: 'questao_delete', methods: ['POST'])]
    public function delete(Request $request, Tbquestao $tbquestao): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tbquestao->getIdquestao(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tbquestao);
            $entityManager->flush();
        }

        return $this->redirectToRoute('questao_index', [], Response::HTTP_SEE_OTHER);
    }
}
