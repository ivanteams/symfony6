<?php

namespace App\Repository;

use App\Entity\Posiciones;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Posiciones>
 *
 * @method Posiciones|null find($id, $lockMode = null, $lockVersion = null)
 * @method Posiciones|null findOneBy(array $criteria, array $orderBy = null)
 * @method Posiciones[]    findAll()
 * @method Posiciones[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PosicionesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Posiciones::class);
    }

//    /**
//     * @return Posiciones[] Returns an array of Posiciones objects
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

//    public function findOneBySomeField($value): ?Posiciones
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
