<?php
namespace Repository;

use Doctrine\ORM\EntityRepository;

class CommentRepository extends \Repository\AppRepository
{
    public static function getInstance()
    {
        $entityManager = CommentRepository::getManager();
        return $entityManager->getRepository('Model\Comment');
    }

    public static function search($params)
    {
        $query = CommentRepository::getInstance()->createQueryBuilder('p');
        if (isset($params['shouldUseExactSearch']) && $params['shouldUseExactSearch']) {
            if (isset($params['text'])) {
                $query->andWhere('p.text = :text');
                $query->setParameter('text', $params['text']);
            }
        } else {
            if (isset($params['text'])) {
                $query->andWhere('p.text like :text');
                $query->setParameter('text', '%' . $params['text'] . '%');
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