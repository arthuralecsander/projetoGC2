<?php

namespace App\Repository;

use App\Entity\Tbassunto;
use App\Entity\Tbquestao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AssuntoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tbassunto::class);
    }

    public function buscarAssunto(int $idBanca, int $idOrgao)
    {
        $qb = $this->createQueryBuilder('a')
            ->select('a.idassunto, a.assunto, identity(a.idassuntopai) as idassuntopai, count(q.tbassuntoid) as qnt')
            ->innerJoin(Tbquestao::class,'q', 'WITH','a.idassunto = q.tbassuntoid')
            ->groupBy('q.tbassuntoid');

        if($idBanca != null){
            $qb->where('q.tbbancaid = :idBanca')
                ->setParameter('idBanca', $idBanca);
        }

        if($idOrgao != null){
            $qb->andWhere('q.tborgaoid = :idOrgao')
                ->setParameter('idOrgao', $idOrgao);
        }



        $query = $qb->getQuery();

        return $query->execute();
    }
}