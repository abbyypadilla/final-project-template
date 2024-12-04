<?php

namespace app\controllers;

class MainController extends Controller {
    
    public function homepage() {
        $this->returnView('./assets/views/main/homepage.html');
    }

    public function about() {
        $this->returnView('./assets/views/main/about.html');
    }
    
    public function contact() {
        $this->returnView('./assets/views/main/contact.html');
    }

    public function portfolio() {
        $this->returnView('./assets/views/projects/portfolio.html');
    }
}
