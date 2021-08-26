<?php

namespace App\Controller;

use App\Entity\Tbassunto;
use App\Entity\Tbbanca;
use App\Entity\Tborgao;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class ProgramaEstudosController extends AbstractController
{
    #[Route('/', name: 'programa_estudos')]
    public function show(): Response
    {
        return $this->render('programa_estudos/index.html.twig');
    }

    #[Route('/getAssunto', methods: ['GET'])]
    public function getAssunto(): Response
    {
        $tbassuntos = $this->getDoctrine()
            ->getRepository(Tbassunto::class)
            ->findAll();

        $serializer = $this->container->get('serializer');
        $request = Request::createFromGlobals();
        $banca = $request->query->get('idbanca');
        $orgao = $request->query->get('idorgao');

        $assuntoRepository = $this->getDoctrine()
            ->getRepository(Tbassunto::class);
        $filhos = $assuntoRepository->buscarAssunto($banca,$orgao);

        $assuntosArray = array ();
        foreach ($tbassuntos as $tbassunto){
            $filhosArray = array();
            foreach ($filhos as $tbassuntoFilho){
                if($tbassunto->getIdassunto() == $tbassuntoFilho["idassuntopai"]){
                    $filhoArray = array(
                        'id' => $tbassuntoFilho["idassunto"],
                        'name' => $tbassuntoFilho["assunto"],
                        'qnt' => $tbassuntoFilho["qnt"]
                    );
                    array_push($filhosArray,$filhoArray);
                }

            }
            if(!$tbassunto->getIdassuntopai()){
                $tbassuntoArray = array(
                    'id' => $tbassunto->getIdassunto(),
                    'name' => $tbassunto->getAssunto(),
                    'children' => $filhosArray
                );
                array_push($assuntosArray,$tbassuntoArray);
            }
        }
        $arrayFinal = array(
            'name' => 'Arvore de Assuntos',
            'children' => $assuntosArray
        );
        $array = array();
        array_push($array,$arrayFinal);

        $reports = $serializer->serialize($array, 'json');
        return new Response($reports);
    }

    #[Route('/getBanca', methods: ['GET'])]
    public function getBanca(): Response
    {
        $tbbancas = $this->getDoctrine()
            ->getRepository(Tbbanca::class)
            ->findAll();

        $serializer = $this->container->get('serializer');

        $array = array();
        foreach ($tbbancas as $tbbanca){
            $banca = array(
                'id' => $tbbanca->getIdbanca(),
                'banca' => $tbbanca->getNomebanca()
            );
            array_push($array,$banca);
        }

        $reports = $serializer->serialize($array, 'json');
        return new Response($reports);
    }

    #[Route('/getOrgao', methods: ['GET'])]
    public function getOrgao(): Response
    {
        $tborgaos = $this->getDoctrine()
            ->getRepository(Tborgao::class)
            ->findAll();

        $serializer = $this->container->get('serializer');

        $array = array();
        foreach ($tborgaos as $tborgao){
            $orgao = array(
                'id' => $tborgao->getIdorgao(),
                'orgao' => $tborgao->getNomeorgao()
            );
            array_push($array,$orgao);
        }

        $reports = $serializer->serialize($array, 'json');

        return new Response($reports);
    }


}
