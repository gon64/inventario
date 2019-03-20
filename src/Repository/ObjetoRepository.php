<?php

namespace App\Repository;

use App\Entity\Objeto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Objeto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Objeto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Objeto[]    findAll()
 * @method Objeto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjetoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Objeto::class);
    }

    // /**
    //  * @return Objeto[] Returns an array of Objeto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Objeto
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
