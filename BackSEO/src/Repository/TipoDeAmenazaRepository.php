<?php

namespace App\Repository;

use App\Entity\TipoDeAmenaza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TipoDeAmenaza>
 *
 * @method TipoDeAmenaza|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoDeAmenaza|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoDeAmenaza[]    findAll()
 * @method TipoDeAmenaza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoDeAmenazaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoDeAmenaza::class);
    }

    public function save(TipoDeAmenaza $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TipoDeAmenaza $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TipoDeAmenaza[] Returns an array of TipoDeAmenaza objects
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

//    public function findOneBySomeField($value): ?TipoDeAmenaza
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
