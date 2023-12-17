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
    // 1
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Ping();
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // 2
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Authentication\CookieInit('admin', 'PrP4GCN4e63z');
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // $objRequest = new \AgileBM\PhpCouchDb\Request\Server\Info();
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // $objRequest = new \AgileBM\PhpCouchDb\Request\Authentication\Cookie('admin', 'PrP4GCN4e63z');
    $objRequest = new \AgileBM\PhpCouchDb\Request\Authentication\Cookie('admin', 'eM8K&33M');
    $objResponse = $objConnection->Authenticate($objRequest);
    //echo $objResponse;
    // sleep(3);

    // 3
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Authentication\CookieDestroy;
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // 4
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Authentication\CookieInfo();
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // $objRequest = new \AgileBM\PhpCouchDb\Request\Server\Uuids();
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    //$objRequest = new \AgileBM\PhpCouchDb\Request\Database\Create('db_test_2', 2, 3, false);
    //$objRequest = new \AgileBM\PhpCouchDb\Request\Database\Delete('db_test_2');

    // $arrEmployee = [
    //     '_id' => '1:123',
    //     'Name' => 'Mostafa Zakaria',
    //     'Grade' => 9,
    //     'DOB' => '1981-08-20',
    //     'Gender' => 'ذكر',
    //     'Address' => '319 الياسمين 1 - التجمع الأول',
    // ];
    $objEmployee = new stdClass();
    $objEmployee->_id = '1:128';
    $objEmployee->Name = 'Mostafa Zakaria';
    $objEmployee->Grade = 9;
    $objEmployee->DOB = '1981-08-20';
    $objEmployee->Gender = 'ذكر';
    $objEmployee->Address = '319 الياسمين 1 - التجمع الأول';

    $objRequest = new \AgileBM\PhpCouchDb\Request\Document\Create('db_test', $objEmployee);
    $objResponse = $objConnection->Request($objRequest);
    echo $objResponse;

    // $objQuery = new \AgileBM\PhpCouchDb\Request\Query();
    // $objQuery->SetKey('1:126');
    //$objQuery->SetKeys(['1:123', '1:126']);
    //$objQuery->SetStartKey('1:126');
    //$objQuery->SetEndKey("1:128");
    //$objQuery->SetDescending(true);
    //$objRequest = new \AgileBM\PhpCouchDb\Request\Database\GetAllDocs('db_test');
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\AllDocs('db_test', $objQuery);
    // $objResponse = $objConnection->Request($objRequest);
    // echo $objResponse;

    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\Info('db_test_2');
    // $objResponse = $objConnection->Request($objRequest);
    // echo $objResponse;
} catch (\AgileBM\PhpCouchDb\Exception $ex) {
    var_dump($ex->getMessage());
    var_dump($ex->getCode());
}
