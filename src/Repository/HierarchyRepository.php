<?php

namespace App\Repository;

use App\Entity\Hierarchy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Hierarchy>
 *
 * @method Hierarchy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hierarchy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hierarchy[]    findAll()
 * @method Hierarchy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HierarchyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hierarchy::class);
    }

//    /**
//     * @return Hierarchy[] Returns an array of Hierarchy objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Hierarchy
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
