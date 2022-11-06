<?php

namespace App\Repository;

use App\Entity\TiempoAmenaza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TiempoAmenaza>
 *
 * @method TiempoAmenaza|null find($id, $lockMode = null, $lockVersion = null)
 * @method TiempoAmenaza|null findOneBy(array $criteria, array $orderBy = null)
 * @method TiempoAmenaza[]    findAll()
 * @method TiempoAmenaza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TiempoAmenazaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TiempoAmenaza::class);
    }

    public function save(TiempoAmenaza $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TiempoAmenaza $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TiempoAmenaza[] Returns an array of TiempoAmenaza objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TiempoAmenaza
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
