<?php

namespace App\Repository;

use App\Entity\ClotheSize;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClotheSize>
 *
 * @method ClotheSize|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClotheSize|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClotheSize[]    findAll()
 * @method ClotheSize[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClotheSizeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClotheSize::class);
    }

//    /**
//     * @return ClotheSize[] Returns an array of ClotheSize objects
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

//    public function findOneBySomeField($value): ?ClotheSize
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
