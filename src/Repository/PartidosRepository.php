<?php

namespace App\Repository;

use App\Entity\Partidos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Partidos>
 *
 * @method Partidos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Partidos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Partidos[]    findAll()
 * @method Partidos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartidosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partidos::class);
    }

//    /**
//     * @return Partidos[] Returns an array of Partidos objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Partidos
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
