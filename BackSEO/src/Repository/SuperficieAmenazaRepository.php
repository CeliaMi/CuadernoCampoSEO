<?php

namespace App\Repository;

use App\Entity\SuperficieAmenaza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SuperficieAmenaza>
 *
 * @method SuperficieAmenaza|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuperficieAmenaza|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuperficieAmenaza[]    findAll()
 * @method SuperficieAmenaza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuperficieAmenazaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuperficieAmenaza::class);
    }

    public function save(SuperficieAmenaza $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SuperficieAmenaza $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SuperficieAmenaza[] Returns an array of SuperficieAmenaza objects
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

//    public function findOneBySomeField($value): ?SuperficieAmenaza
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
