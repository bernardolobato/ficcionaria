<?php
namespace Repository;
use Doctrine\ORM\EntityManager;

use Doctrine\ORM\EntityRepository;

class PostRepository extends \Repository\AppRepository
{
    public static function getInstance() {
        $entityManager = PostRepository::getManager();
        return $entityManager->getRepository('Model\Post');
    }
    public static function getRecentPosts($number = 30)
    {
        $dql = "SELECT p, pr FROM Post p JOIN p.profile ORDER BY b.created DESC";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults($number);
        return $query->getResult();
    }

    public static function search($params) {
        $query = PostRepository::getManager()->createQueryBuilder();
        $query->select(['partial p.{id, title, teaser, status, postedAt, created, modified}','pr']);
        $query->from('Model\Post', 'p');
        $query->leftjoin('p.profile', 'pr');
       // $query->addSelect('pr');
        if (isset( $params['textSubstring'])) {
        }

        if (isset($params['shouldUseExactSearch']) && $params['shouldUseExactSearch'])  {
            $query->andWhere('p.title = :title');
            $query->setParameter('title', $params['title']);
            if ($params['text']) {
                $query->andWhere('p.text = :text');
                $query->setParameter('text', $params['text']);
            }
        } else {
            if (isset($params['title'])) {
                $query->andWhere('p.title like :title');
                $query->setParameter('title', '%'.$params['title'].'%');
            }
            if (isset($params['text'])) {
                $query->andWhere('p.text like :text');
                $query->setParameter('text', '%'.$params['text'].'%');

            }
        }
        if (isset($params['status'])) {
            $query->andWhere('p.status = :status');
            $query->setParameter('status', $params['status']);
        }

        if (isset($params['numMaxResults'])) {
            $query->setMaxResults($params['numMaxResults']);
        }
        if (isset($params['offset'])) {
            $query->setFirstResult($params['offset']);
        }
        $query->orderBy('p.id', 'DESC');
        print_r(json_encode($query->getQuery()->getResult()));
        die;

        return $query->getQuery()->getResult();
    }
}