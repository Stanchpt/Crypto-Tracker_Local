<?php

namespace App\Repository;

use App\Entity\InvestissementJour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvestissementJour|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvestissementJour|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvestissementJour[]    findAll()
 * @method InvestissementJour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvestissementJourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvestissementJour::class);
    }

    public function findinvestjourDQL()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT i.date_invest FROM App\Entity\InvestissementJour i'
            )
            ->getResult();
    }

    public function findmontantinvestjourDQL()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT i.montant_invest FROM App\Entity\InvestissementJour i'
            )
            ->getResult();
    }

    public function findnbjourDQL($date_invest)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(i.date_invest) FROM App\Entity\InvestissementJour i 
                Where i.date_invest = :dateinvest'
            )
            ->setParameters([
                'dateinvest' => $date_invest
            ])
            ->getResult();
    }

    /*
    public function findOneBySomeField($value): ?InvestissementJour
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
