<?php

// Paths of Application
const SEPARATOR = DIRECTORY_SEPARATOR;
define('ROOT', dirname(__DIR__));
const APP = ROOT . SEPARATOR . 'App';
const CONFIG = APP . SEPARATOR . 'Config';
const CONTROLLERS = APP . SEPARATOR . 'Controllers';
const CORE = APP . SEPARATOR . 'Core';
const MODELS = APP . SEPARATOR . 'Models';
const VIEWS = APP . SEPARATOR . 'Views' . SEPARATOR;

//Database Config

define("SERVER", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE_TYPE", "mysql");
define("DATABASE_NAME", "training");
define("PORT", "3306");
define('CHARSET', 'utf8');

require_once '../vendor/autoload.php';

$app = new \Apps\Square\Core\App();
