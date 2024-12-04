<?php

namespace app\controllers;

use app\models\PortfolioModel;

class PortfolioController {

    private $portfolioModel;

    public function __construct() {
        $this->portfolioModel = new PortfolioModel();
    }

    public function getProjects() {
        $projects = $this->portfolioModel->getAllProjects();
        include './assets/views/projects/portfolio.html'; 
    }
}

?>
