<?php

namespace App\Repository;

use App\Entity\Clubes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Clubes>
 *
 * @method Clubes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clubes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clubes[]    findAll()
 * @method Clubes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClubesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Clubes::class);
    }

//    /**
//     * @return Clubes[] Returns an array of Clubes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Clubes
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
