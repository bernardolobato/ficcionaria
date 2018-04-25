<?php
namespace Project;
require __DIR__ . '/../vendor/autoload.php';

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}



session_start();
require __DIR__ . '/../src/doctrine-config.php';

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';

$values['settings'] = $settings;
$container = new \Slim\Container($settings);
$app = new \Slim\App($container);

$container = $app->getContainer();
$container['postBusiness'] = function ($container) {
    $business = new \Business\PostBusiness();
    return $business;
};
$container['profileBusiness'] = function ($container) {
    $business = new \Business\ProfileBusiness();
    return $business;
};
$container['commentBusiness'] = function ($container) {
    $business = new \Business\CommentBusiness();
    return $business;
};

$container['followerBusiness'] = function ($container) {
    $business = new \Business\FollowerBusiness();
    return $business;
};

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';
//print_r($app);


// Run app
$app->run();
