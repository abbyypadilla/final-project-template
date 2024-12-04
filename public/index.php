<?php

require '../app/core/setup.php'; 
use app\core\Router;
use app\models\PortfolioModel; 

$router = new Router();

$portfolioModel = new PortfolioModel();

$projects = $portfolioModel->getAllProjects();
if (!is_array($projects)) {
    $projects = [];
}

?>
