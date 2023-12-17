<?php

require __DIR__.'/../autoload.php';

// $arrEmployee = [
//     'Name' => 'Mostafa Zakaria',
//     'Grade' => 9,
//     'DOB' => '1981-08-20',
//     'Gender' => 'ذكر',
//     'Address' => '319 الياسمين 1 - التجمع الأول',
// ];
// echo json_encode($arrEmployee, JSON_UNESCAPED_UNICODE);
// die();

\AgileBM\PhpCouchDb\ConnectionManager::Init();
// \AgileBM\PhpCouchDb\ConnectionManager::AddServer('CouchDB-01', 'https://couchdb01.modulus.biz:6984');
\AgileBM\PhpCouchDb\ConnectionManager::AddServer('CouchDB-01', 'http://127.0.0.1:5984/');
$objConnection = &\AgileBM\PhpCouchDb\ConnectionManager::GetConnection('CouchDB-01');

try {

    // $objRequest = new \AgileBM\PhpCouchDb\Request\Authentication\Cookie('admin', 'PrP4GCN4e63z');
    $objRequest = new \AgileBM\PhpCouchDb\Request\Authentication\Cookie('admin', 'eM8K&33M');
    $objResponse = $objConnection->Authenticate($objRequest);
    //echo $objResponse;
    // sleep(3);

    // 1
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Ping();
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // 2
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Authentication\CookieInit('admin', 'PrP4GCN4e63z');
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // 3
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Server\Info();
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test list of db
    // $objQuery = new \AgileBM\PhpCouchDb\Request\Query();
    // $objQuery->SetDescending(true);
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Server\AllDBs($objQuery);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test DBs info All
    // $objQuery = new \AgileBM\PhpCouchDb\Request\Query();
    // $objQuery->SetDescending(true);
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Server\DBInfoAll($objQuery);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test DBs info 
    // $objQuery = new \AgileBM\PhpCouchDb\Request\Query();
    // $objQuery->SetKeys(['db_common', 'db_test']);
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Server\DBInfo($objQuery);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test DBs updates 
    // $objQuery = new \AgileBM\PhpCouchDb\Request\Query();
    // $objQuery->SetFeed(\AgileBM\PhpCouchDb\Request\Query::FEED_PARAMETER_NORMAL);
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Server\DBUpdates($objQuery);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test DBs reshard 
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Server\DBReshard();
    // $objResponse = $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Memebership
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Server\Membership();
    // $objResponse = $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Node Restart
    $strNodeName = 'couchdb@localhost';
    $objRequest = new \AgileBM\PhpCouchDb\Request\Server\NodeRestart($strNodeName);
    $objResponse = $objConnection->Request($objRequest);
    echo $objResponse;

} catch (\AgileBM\PhpCouchDb\Exception $ex) {
    var_dump($ex->getMessage());
    var_dump($ex->getCode());
}
