<?php

namespace App\Repository;

use App\Entity\Vehicules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vehicules|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehicules|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehicules[]    findAll()
 * @method Vehicules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehicules::class);
    }
}
