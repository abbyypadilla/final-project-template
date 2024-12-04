<?php

require '../app/core/Router.php';
require '../app/models/Model.php';
require '../app/controllers/Controller.php';

require '../app/models/PortfolioModel.php';
require '../app/models/User.php';

require '../app/controllers/MainController.php';
require '../app/controllers/PortfolioController.php';
require '../app/controllers/ContactController.php';

$env = parse_ini_file('../.env');

define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
define('DBDRIVER', '');

define('DEBUG', true);
