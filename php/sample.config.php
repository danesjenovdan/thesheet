<?php
session_start();
header ('Content-type: text/html; charset=utf-8');

define('__CMS_ROOT__', str_replace('\\', '/', $_SERVER["DOCUMENT_ROOT"].'/'));

$addedFolder = '';

require_once(__CMS_ROOT__.$addedFolder.'php/conf_local.db.php');
require_once(__CMS_ROOT__.$addedFolder.'vendor/autoload.php');
require_once(__CMS_ROOT__.$addedFolder.'php/include/shared.class.php');
require_once(__CMS_ROOT__.$addedFolder.'php/include/template.class.php');
require_once(__CMS_ROOT__.$addedFolder.'php/include/rb.php');


date_default_timezone_set('Europe/Ljubljana');

define('DB_SERVER', "localhost");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "");
define('DB_DATABASE', "dropler");
define('CACHE', false);
define('CACHE_DIR', dirname(__FILE__) . '/cache/');
define('CACHE_DRIVER', "files");

define("GA_CLIENT_ID", "");
define("GA_APP_NAME", "theSheetz");
putenv('GOOGLE_APPLICATION_CREDENTIALS=' . __CMS_ROOT__ . '/certs/sheetz-.json');

define("__LOCALURL", 'http://localhost/dropler');


R::setup('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
R::freeze(false);

