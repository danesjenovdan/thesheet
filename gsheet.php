<?php
error_reporting(E_ALL);
require 'vendor/autoload.php';
require('php/config.php');

header('Access-Control-Allow-Origin: *');

use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;
use phpFastCache\CacheManager;


$key = $_GET["id"];

if (empty($key)) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array("error" => "noid"));
    die();
}


CacheManager::setDefaultConfig(array(
    "path" => CACHE_DIR, // or in windows "C:/tmp/"
));
$InstanceCache = CacheManager::getInstance(CACHE_DRIVER);


$CachedString = $InstanceCache->getItem($key);
if (!is_null($CachedString->get())) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(unserialize($CachedString->get()));
    die();
}


$client = new Google_Client;
//$http = new \GuzzleHttp\Client(['verify', 'C:\cacert.pem']);
//$http = new \GuzzleHttp\Client(array('verify', false));
$http = new \GuzzleHttp\Client();
$client->setHttpClient($http);
$client->useApplicationDefaultCredentials();

$client->setApplicationName(GA_APP_NAME);
$client->setScopes(['https://www.googleapis.com/auth/drive', 'https://spreadsheets.google.com/feeds']);

if ($client->isAccessTokenExpired()) {
    $client->refreshTokenWithAssertion();
}

$accessToken = $client->fetchAccessTokenWithAssertion()["access_token"];
ServiceRequestFactory::setInstance(
    new DefaultServiceRequest($accessToken)
);

$book = R::load('gsheet', $key);

if ($book->id < 1) {
    $gsheetId = 'https://spreadsheets.google.com/feeds/spreadsheets/private/full/1fQ4u38ELCax6qpXJIAKxl5jpuj-MQ0XAkvwKjbQcvYI';
} else {

    $id = $book->url;
    $id = str_replace('https://docs.google.com/spreadsheets/d/', '', $id);
    $id = substr($id, 0, strpos($id, "/"));
    $gsheetId = "https://spreadsheets.google.com/feeds/spreadsheets/private/full/" . $id;
}

$spreadsheet = (new Google\Spreadsheet\SpreadsheetService)->getSpreadsheetFeed()->getById($gsheetId);

$worksheets = $spreadsheet->getWorksheetFeed()->getEntries();
$worksheet = $worksheets[0];

$listFeed = $worksheet->getListFeed();

$returnArray = array();

foreach ($listFeed->getEntries() as $entry) {
    $representative = $entry->getValues();
    $returnArray[] = $representative;
}



header('Content-Type: application/json; charset=utf-8');
echo json_encode($returnArray);

$CachedString->set(serialize($returnArray))->expiresAfter(360);
$InstanceCache->save($CachedString);
