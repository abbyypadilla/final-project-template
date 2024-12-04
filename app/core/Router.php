<?php

namespace app\core;

use app\controllers\MainController;
use app\controllers\PortfolioController;
use app\controllers\ContactController;  

require_once '../app/models/ContactModel.php';

class Router {
    public $urlArray;

    function __construct() {
        $this->urlArray = $this->routeSplit();
        $this->handleMainRoutes();
        $this->handlePortfolioRoutes();  
        $this->handlePageRoutes();
        $this->handleContactRoutes();  
    }

    protected function routeSplit() {
        $removeQueryParams = strtok($_SERVER["REQUEST_URI"], '?');
        return explode("/", $removeQueryParams);
    }

    protected function handleMainRoutes() {
        if ($this->urlArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController = new MainController();
            $mainController->homepage();
        }
    }

    protected function handlePortfolioRoutes() {
        $portfolioController = new PortfolioController();
        if ($this->urlArray[1] === 'portfolio' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $portfolioController->getProjects();
        }
    }

    protected function handlePageRoutes() {
        $mainController = new MainController();

        if ($this->urlArray[1] === 'about' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController->about();
        }

        if ($this->urlArray[1] === 'contact' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController->contact();
        }

        if ($this->urlArray[1] === 'portfolio' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $mainController->portfolio();
        }
    }

    protected function handleContactRoutes() {
        //var_dump($this->urlArray); used for testing purposes
        echo '<br>';
        if ($this->urlArray[1] === 'contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $contactController = new ContactController();
            $contactController->submitContactForm();
        }
    }
    
    
}

?>
