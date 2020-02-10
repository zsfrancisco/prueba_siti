<?php

namespace App\Repository;

use App\Entity\ContratoProducto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContratoProducto|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContratoProducto|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContratoProducto[]    findAll()
 * @method ContratoProducto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratoProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContratoProducto::class);
    }

    // /**
    //  * @return ContratoProducto[] Returns an array of ContratoProducto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContratoProducto
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
