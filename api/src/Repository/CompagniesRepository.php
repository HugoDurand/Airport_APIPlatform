<?php

namespace App\Repository;

use App\Entity\Compagnies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Compagnies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Compagnies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Compagnies[]    findAll()
 * @method Compagnies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompagniesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Compagnies::class);
    }

    // /**
    //  * @return Compagnies[] Returns an array of Compagnies objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Compagnies
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
