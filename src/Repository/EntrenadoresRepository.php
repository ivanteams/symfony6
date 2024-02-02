<?php

namespace App\Repository;

use App\Entity\Entrenadores;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Entrenadores>
 *
 * @method Entrenadores|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entrenadores|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entrenadores[]    findAll()
 * @method Entrenadores[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntrenadoresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entrenadores::class);
    }

//    /**
//     * @return Entrenadores[] Returns an array of Entrenadores objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Entrenadores
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
