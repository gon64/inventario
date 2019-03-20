<?php

namespace App\Repository;

use App\Entity\TipoObjeto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoObjeto|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoObjeto|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoObjeto[]    findAll()
 * @method TipoObjeto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoObjetoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoObjeto::class);
    }

    // /**
    //  * @return TipoObjeto[] Returns an array of TipoObjeto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoObjeto
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
