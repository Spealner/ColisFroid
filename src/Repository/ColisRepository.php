<?php

namespace App\Repository;

use App\Entity\Colis;
use App\Entity\Vehicules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Colis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Colis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Colis[]    findAll()
 * @method Colis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Colis::class);
    }

    /**
     * @return Colis[]
     */
    public function allBox()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Colis[]
     */
    public function findAllVehicules(Vehicules $vehicule): array
    {
        return $this->createQueryBuilder('p')
            ->where(':vehicule MEMBER OF p.vehicule')
            ->setParameter('vehicule', $vehicule)
            ->getQuery()
            ->getResult()
            ;
    }
}
