<?php
namespace Repository;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class AppRepository extends EntityRepository {
    private static $manager;
    
    public static function getManager() {
        
        if (!AppRepository::$manager) {
            $isDevMode = true;
            $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../model"), $isDevMode, null, null, false);
            $conn = array(
                'driver'   => 'pdo_mysql',
                'user'     => 'root',
                'password' => 'root',
                'dbname'   => 'ficcionaria',
            );
            $manager = EntityManager::create($conn, $config);
            AppRepository::$manager = $manager;
        }
        return AppRepository::$manager;
    }

    public static function save($entity) {
        AppRepository::getManager()->persist($entity);
        AppRepository::getManager()->flush();
        return $entity;
    }

    public static function update($entity) {
        $entity = AppRepository::getManager()->merge($entity);
        AppRepository::getManager()->flush();
        return $entity;
    }

    public static function delete($entity) {

        $entity = ProfileRepository::getManager()->merge($entity);
        ProfileRepository::getManager()->remove($entity);
        ProfileRepository::getManager()->flush();
        return $entity;
    }

    public static function saveNew($entity) {
        AppRepository::getManager()->persist($entity);
        AppRepository::getManager()->flush();
        return $entity;
    }
// or if you prefer XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config"), $isDevMode);
// database configuration parameters

// obtaining the entity manager
}