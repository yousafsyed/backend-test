#!/usr/bin/env php
<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
// Import the Symfony Console Application 
use Symfony\Component\Console\Application; 
use Service\Console\Import;
use Service\Importer\VideoImporter;

$app = new Application();
$app->add(new Import(new VideoImporter()));
$app->run();