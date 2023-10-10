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
\AgileBM\PhpCouchDb\ConnectionManager::AddServer('CouchDB-01', 'https://couchdb01.modulus.biz:6984');
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

    $objRequest = new \AgileBM\PhpCouchDb\Request\Authentication\Cookie('admin', 'PrP4GCN4e63z');
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
    $arrEmployee = new stdClass();
    $arrEmployee->_id = '1:128';
    $arrEmployee->Name = 'Mostafa Zakaria';
    $arrEmployee->Grade = 9;
    $arrEmployee->DOB = '1981-08-20';
    $arrEmployee->Gender = 'ذكر';
    $arrEmployee->Address = '319 الياسمين 1 - التجمع الأول';

    //$objRequest = new \AgileBM\PhpCouchDb\Request\Document\Create('db_test', $arrEmployee);

    $objQuery = new \AgileBM\PhpCouchDb\Request\Database\Query();
    $objQuery->SetKey('1:126');
    //$objQuery->SetKeys(['1:123', '1:126']);
    //$objQuery->SetStartKey('1:126');
    //$objQuery->SetEndKey("1:128");
    //$objQuery->SetDescending(true);
    //$objRequest = new \AgileBM\PhpCouchDb\Request\Database\GetAllDocs('db_test');
    $objRequest = new \AgileBM\PhpCouchDb\Request\Database\AllDocs('db_test', $objQuery);
    $objResponse = $objConnection->Request($objRequest);
    echo $objResponse;

    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\Info('db_test_2');
    // $objResponse = $objConnection->Request($objRequest);
    // echo $objResponse;
} catch (\AgileBM\PhpCouchDb\Exception $ex) {
    var_dump($ex->getMessage());
    var_dump($ex->getCode());
}
