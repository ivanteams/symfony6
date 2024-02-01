<?php

namespace App\Repository;

use App\Entity\Alumnos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Alumnos>
 *
 * @method Alumnos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alumnos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alumnos[]    findAll()
 * @method Alumnos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlumnosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alumnos::class);
    }

//    /**
//     * @return Alumnos[] Returns an array of Alumnos objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Alumnos
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
