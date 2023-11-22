<?php

namespace App\Repository;

use App\Entity\ShoeSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ShoeSize>
 *
 * @method ShoeSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShoeSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShoeSize[]    findAll()
 * @method ShoeSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShoeSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShoeSize::class);
    }

//    /**
//     * @return ShoeSize[] Returns an array of ShoeSize objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ShoeSize
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
