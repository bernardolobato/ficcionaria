<?php
namespace Repository;

use Doctrine\ORM\EntityRepository;

class ProfileRepository extends \Repository\AppRepository
{
    public static function getInstance()
    {
        $entityManager = ProfileRepository::getManager();
        return $entityManager->getRepository('Model\Profile');
    }

    public static function search($params)
    {
        $query = ProfileRepository::getInstance()->createQueryBuilder('p');
        if (isset($params['shouldUseExactSearch']) && $params['shouldUseExactSearch']) {
            if (isset($params['name'])) {
                $query->andWhere('p.name = :name');
                $query->setParameter('name', $params['name']);
            }
            if ($params['bio']) {
                $query->andWhere('p.bio = :bio');
                $query->setParameter('bio', $params['bio']);
            }
        } else {
            if (isset($params['name'])) {
                $query->andWhere('p.name like :name');
                $query->setParameter('name', '%' . $params['name'] . '%');
            }
            if (isset($params['bio'])) {
                $query->andWhere('p.bio like :bio');
                $query->setParameter('bio', '%' . $params['bio'] . '%');

            }
        }
        if (isset($params['status'])) {
            $query->andWhere('p.status = :status');
            $query->setParameter('status', $params['status']);
        }

        $query->setMaxResults($params['numMaxResults']);
        $query->setFirstResult($params['offset']);
        return $query->getQuery()->getResult();
    }
}