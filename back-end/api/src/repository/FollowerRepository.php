<?php
namespace Repository;

use Doctrine\ORM\EntityRepository;

class FollowerRepository extends \Repository\AppRepository
{
    public static function getInstance()
    {
        $entityManager = FollowerRepository::getManager();
        return $entityManager->getRepository('Model\Follower');
    }

    public static function search($params)
    {
        $query = FollowerRepository::getInstance()->createQueryBuilder('p');
        if (isset($params['follower'])) {
            $query->andWhere('p.follower = :idFollower');
            $query->setParameter('idFollower', $params['follower']);
        }
        if (isset($params['followed'])) {
            $query->andWhere('p.followed = :idFollowed');
            $query->setParameter('idFollowed', $params['followed']);
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