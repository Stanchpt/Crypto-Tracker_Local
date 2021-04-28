<?php

namespace App\Repository;

use App\Entity\DeleteTransac;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DeleteTransac|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeleteTransac|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeleteTransac[]    findAll()
 * @method DeleteTransac[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeleteTransacRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeleteTransac::class);
    }

    public function findMontantSupprimerDQL()
    {
        return $this->getEntityManager()
            ->createQuery(
            'SELECT SUM(d.prix_transac) AS montant_suppr FROM App\Entity\DeleteTransac d'
            )
            ->getResult();
    }

    /*
    public function findOneBySomeField($value): ?DeleteTransac
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
