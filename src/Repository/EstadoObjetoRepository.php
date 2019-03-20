<?php

namespace App\Repository;

use App\Entity\EstadoObjeto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EstadoObjeto|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoObjeto|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoObjeto[]    findAll()
 * @method EstadoObjeto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoObjetoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EstadoObjeto::class);
    }

    // /**
    //  * @return EstadoObjeto[] Returns an array of EstadoObjeto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EstadoObjeto
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
