<?php

namespace App\Repository;

use App\Entity\GravedadAmenaza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GravedadAmenaza>
 *
 * @method GravedadAmenaza|null find($id, $lockMode = null, $lockVersion = null)
 * @method GravedadAmenaza|null findOneBy(array $criteria, array $orderBy = null)
 * @method GravedadAmenaza[]    findAll()
 * @method GravedadAmenaza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GravedadAmenazaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GravedadAmenaza::class);
    }

    public function save(GravedadAmenaza $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(GravedadAmenaza $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return GravedadAmenaza[] Returns an array of GravedadAmenaza objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GravedadAmenaza
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
