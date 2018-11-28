<?php
 
error_reporting(E_ALL);
ini_set('display_errors', '1');
 
 
require __DIR__.'/vendor/autoload.php';
 
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
 
$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/google-service-account.json');
$apiKey = 'AIzaSyCJNPh3U0AXNiyP1fmFosld3xakQ-JqpBY';
 
$firebase = (new Factory)
    ->withServiceAccountAndApiKey($serviceAccount, $apiKey)
    ->withDatabaseUri('https://udemy-36b85.firebaseio.com')
    ->create();
 
?>


