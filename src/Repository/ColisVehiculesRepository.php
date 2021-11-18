<?php

namespace App\Repository;

use App\Entity\ColisVehicules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ColisVehicules|null find($id, $lockMode = null, $lockVersion = null)
 * @method ColisVehicules|null findOneBy(array $criteria, array $orderBy = null)
 * @method ColisVehicules[]    findAll()
 * @method ColisVehicules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColisVehiculesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ColisVehicules::class);
    }

    // /**
    //  * @return ColisVehicules[] Returns an array of ColisVehicules objects
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
    public function findOneBySomeField($value): ?ColisVehicules
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
