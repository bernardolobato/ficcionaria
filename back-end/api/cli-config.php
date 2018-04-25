<?php
// cli-config.php
require_once "src/doctrine-config.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);