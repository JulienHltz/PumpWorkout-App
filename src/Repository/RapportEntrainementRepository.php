<?php

namespace App\Repository;

use App\Entity\RapportEntrainement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RapportEntrainement>
 *
 * @method RapportEntrainement|null find($id, $lockMode = null, $lockVersion = null)
 * @method RapportEntrainement|null findOneBy(array $criteria, array $orderBy = null)
 * @method RapportEntrainement[]    findAll()
 * @method RapportEntrainement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RapportEntrainementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RapportEntrainement::class);
    }

    public function save(RapportEntrainement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RapportEntrainement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return RapportEntrainement[] Returns an array of RapportEntrainement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RapportEntrainement
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
