<?php
// doctrine-config.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

//require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/model"), $isDevMode, null, null, false);
// or if you prefer XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config"), $isDevMode);
// database configuration parameters
$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'ficcionaria',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);