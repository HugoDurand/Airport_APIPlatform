<?php

namespace App\Repository;

use App\Entity\Aeroports;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Aeroports|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aeroports|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aeroports[]    findAll()
 * @method Aeroports[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AeroportsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Aeroports::class);
    }

    // /**
    //  * @return Aeroports[] Returns an array of Aeroports objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aeroports
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
