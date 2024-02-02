<?php

namespace App\Repository;

use App\Entity\Jugadores;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Jugadores>
 *
 * @method Jugadores|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jugadores|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jugadores[]    findAll()
 * @method Jugadores[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JugadoresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jugadores::class);
    }

//    /**
//     * @return Jugadores[] Returns an array of Jugadores objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('j.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Jugadores
//    {
//        return $this->createQueryBuilder('j')
//            ->andWhere('j.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
