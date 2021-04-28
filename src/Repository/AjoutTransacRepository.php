<?php

namespace App\Repository;

use App\Entity\AjoutTransac;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AjoutTransac|null find($id, $lockMode = null, $lockVersion = null)
 * @method AjoutTransac|null findOneBy(array $criteria, array $orderBy = null)
 * @method AjoutTransac[]    findAll()
 * @method AjoutTransac[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AjoutTransacRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AjoutTransac::class);
    }

    public function findMontantAjouteDQL()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT Sum(a.prixdachat) AS prixajoute FROM App\Entity\AjoutTransac a'
            )
            ->getResult();
    }

    /*
    public function findOneBySomeField($value): ?AjoutTransac
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
