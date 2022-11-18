<?php

use App\Route\Route;

require_once 'vendor/autoload.php';

$controllerDir = dirname(__FILE__) . '/src/Controller';
$dirs = scandir($controllerDir);
$controllers = [];

foreach ($dirs as $dir) {
    if ($dir === "." || $dir === "..") {
        continue;
    }

    $controllers[] = "App\\Controller\\" . pathinfo($controllerDir . DIRECTORY_SEPARATOR . $dir)['filename'];
}

$routesObj = [];

foreach ($controllers as $controller) {
    $reflection = new ReflectionClass($controller);
    foreach ($reflection->getMethods() as $method) {
       foreach ($method->getAttributes() as $attribute) {
           /** @var Route $route */
           $route = $attribute->newInstance();
           $route->setController($controller)
               ->setAction($method->getName());

           $routesObj[] = $route;
       }
    }
}

$url = "/" . trim(explode("?", $_SERVER['REQUEST_URI'])[0], "/");

foreach ($routesObj as $route) {
    if (!$route->match($url) || !in_array($_SERVER['REQUEST_METHOD'], $route->getMethods())) {
        continue;
    }

    $controlerClassName = $route->getController();
    $action = $route->getAction();
    $params = $route->mergeParams($url);

    new $controlerClassName($action, $params);
    exit();
}

echo "NO MATCH";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 - Blog Cards</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
        .card img {
            height: 280px;
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="text-center my-5">
        <h1>Blog MVC</h1>
        <hr />
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-5 shadow-sm">
                <img src="imgs/a.jpg" class="img-fluid" />

                <div class="card-body">
                    <div class="card-title">
                        <h2>Titre de blog</h2>
                    </div>
                    <div class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Deleniti corporis quis ab. Exercitationem et quibusdam
                            impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                            maxime facere, quod harum aliquid in...
                        </p>
                    </div>
                    <a href="#" class="btn btn-outline-primary rounded-0 float-end"
                    >Lire plus</a
                    >
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-5 shadow-sm">
                <img src="imgs/b.jpg" class="img-fluid" />

                <div class="card-body">
                    <div class="card-title">
                        <h2>Titre de blog</h2>
                    </div>
                    <div class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Deleniti corporis quis ab. Exercitationem et quibusdam
                            impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                            maxime facere, quod harum aliquid in...
                        </p>
                    </div>
                    <a href="#" class="btn btn-outline-primary rounded-0 float-end"
                    >Lire plus</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-5 shadow-sm">
                <img src="imgs/c.jpg" class="img-fluid" />

                <div class="card-body">
                    <div class="card-title">
                        <h2>This is the blog title</h2>
                    </div>
                    <div class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Deleniti corporis quis ab. Exercitationem et quibusdam
                            impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                            maxime facere, quod harum aliquid in...
                        </p>
                    </div>
                    <a href="#" class="btn btn-outline-primary rounded-0 float-end"
                    >Read More</a
                    >
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-5 shadow-sm">
                <img src="imgs/d.jpg" class="img-fluid" />

                <div class="card-body">
                    <div class="card-title">
                        <h2>This is the blog title</h2>
                    </div>
                    <div class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Deleniti corporis quis ab. Exercitationem et quibusdam
                            impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                            maxime facere, quod harum aliquid in...
                        </p>
                    </div>
                    <a href="#" class="btn btn-outline-primary rounded-0 float-end"
                    >Read More</a
                    >
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-5 shadow-sm">
                <img src="imgs/e.jpg" class="img-fluid" />

                <div class="card-body">
                    <div class="card-title">
                        <h2>This is the blog title</h2>
                    </div>
                    <div class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Deleniti corporis quis ab. Exercitationem et quibusdam
                            impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                            maxime facere, quod harum aliquid in...
                        </p>
                    </div>
                    <a href="#" class="btn btn-outline-primary rounded-0 float-end"
                    >Read More</a
                    >
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-5 shadow-sm">
                <img src="imgs/f.jpg" class="img-fluid" />

                <div class="card-body">
                    <div class="card-title">
                        <h2>This is the blog title</h2>
                    </div>
                    <div class="card-text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Deleniti corporis quis ab. Exercitationem et quibusdam
                            impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                            maxime facere, quod harum aliquid in...
                        </p>
                    </div>
                    <a href="#" class="btn btn-outline-primary rounded-0 float-end"
                    >Read More</a
                    >
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
