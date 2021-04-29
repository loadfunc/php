<?php

use function parkingomat\PleskDomainsPhp\getDomainsFromHost;
use function parkingomat\PleskDomainsPhp\header_json;

//require("../func/LetSql.php");
//require("../func/DefJson.php");
require("../let_func.php");
require('../vendor/autoload.php');

require("../libs.php");
require '../func/ApiSql.php';

require '../pair/Key.php';
require '../pair/PairInterface.php';
require '../pair/KeyPair.php';
require '../pair/KeyPairCollection.php';
require '../pair/Nameserver.php';
require '../pair/Monitor.php';
require '../pair/Panel.php';
require '../Service/Service.php';
require '../Service/ServiceManager.php';
require '../Service/WebService.php';
require '../Service/WebServiceForm.php';
require '../panel/Auth.php';
require '../panel/Data.php';
require '../panel/Username.php';

require '../monitor/Screenshot.php';




//var_dump($domains_per_host);


# AM REGISTRAR - DOMENA
$domain_registrar = new KeyPair(Key::DOMAIN, Key::REGISTRAR);

# PLESK SERVER - DOMENA
$domain_panel = new KeyPair(Key::DOMAIN, Key::PANEL);

# satio.pl, cloudflare
$domain_dns = new KeyPair(Key::DOMAIN, Key::NAMESERVER);

# list ado widoku tabeli, INPUT, pobierania danych z bazy danych
$table = new KeyPairCollection([
    $domain_registrar,
    $domain_panel,
    $domain_dns
]);


# cloudflare - lista domen - status poprzez obraz z url
$dns_domain_screenshot = new KeyPair(Key::NAMESERVER, Key::DOMAIN, Key::MONITORING);

//$dns_domain_screenshot = new KeyPair(Nameserver::CLOUDFLARE, Key::DOMAIN, Monitor::Screenshot);

/*
$service = new Service(
    'Wyświetl nazwy wszystkich domen wchodzących wskład Panelu użytkownika',
//    [Key::PANEL_AUTH, Key::PANEL_USER], // in
    [new Auth(), new Username()], // in
    [Key::DOMAIN, Key::PANEL_INFO] // out
); // exec


//$service->in = '';
//$service->out = '';

$webservice = new WebService($service, 'POST');
//var_dump($webservice->exec());
//var_dump($webservice->getService()->out);
$data['in'] = $webservice->getService()->in;
$data['out'] = $webservice->getService()->out;
$data['args'] = $webservice->getArgs();
*/


//$form = new WebServiceForm($webservice);
//$form->render();

/*
$manager = new ServiceManager($service);
$manager->start();
$manager->stop();
$manager->status();
*/
//var_dump($dns_domain_screenshot);
