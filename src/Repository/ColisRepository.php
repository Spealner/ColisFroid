<?php

namespace App\Repository;

use App\Entity\Colis;
use App\Entity\Vehicules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
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
     * // retourne colis trier
     *
     * @return Colis[]
     *
     * @return int|mixed|string
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
     * // retourne colis membre d'un vehicule
     *
     * @return Colis[]
     *
     * @param Vehicules $vehicule
     *
     * @return array
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

    /**
     * @param int $page
     * @param int $limit
     *
     * @return Paginator
     */
    public function getPaginatedBox(int $page, int $limit): Paginator
    {
        return new Paginator(
            $this->createQueryBuilder('p')
                ->setMaxResults($limit)
                ->setFirstResult(($page - 1) * $limit)
    );
    }
}
