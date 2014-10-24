<?php

namespace MYT\MakeYourTeamBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * AnnonceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnnonceRepository extends EntityRepository
{

    public function getAnnonceByCategorie(array $catagories)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->join('a.categories', 'c')->addSelect('c');
        $qb->where($qb->expr()->in('c.nom', $catagories));

        return $qb->getQuery()->getResult();
    }

}
