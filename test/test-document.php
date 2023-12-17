<?php

use AgileBM\PhpCouchDb\Request\Database\Query;

require __DIR__.'/../autoload.php';

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

    // Test Document Information
    // $strDatabaseName = "db_test_non_partitioned";
    // $strDocumentID = "65bff5c363f3ec713bb2c2487c005289";
    // $strRevision = '1-ebd7ee99dbc3929997863c0094f4d697';
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Document\Info($strDatabaseName, $strDocumentID, $strRevision);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Get Doc
    // Non Partition
    // $strDatabaseName = "db_test_non_partitioned";
    // $strDocID = "65bff5c363f3ec713bb2c2487c005289";
    // Partitioned  does not work
    // $strDatabaseName = "db_test";
    // $strDocID = "user_level:2";
    // $objQuery = new Query();
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Document\GetDoc($strDatabaseName, $strDocID, $objQuery);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Update Document
    // $strDatabaseName = "db_test_non_partitioned";
    // $strDocID = "65bff5c363f3ec713bb2c2487c005289";
    // $strRevision = "3-0889bb626e7f95c956950019a6f3b9c6";
    //Partitioned  does not work
    // $strDatabaseName = "db_test";
    // $strDocID = "user_level:2";
    // $strRevision = "1-ebd7ee99dbc3929997863c0094f4d697";
    // $objDocument = new \stdClass();
    // $objDocument->_rev = $strRevision;
    // $objDocument->name = "Update a document";
    // $objDocument->description = "This is a document to test updating a document";
    // $objQuery = new Query();
    // $objQuery->new_edits = false;
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Document\Update($strDatabaseName, $strDocID, $objDocument, $objQuery, $strRevision);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;


    // Test Create Documnet
    // $strDatabaseName = "db_test_non_partitioned";
    // $strDatabaseName = "db_test";
    // $objDocument = new \stdClass();
    // $objDocument->_id = "user_level:4";
    // $objDocument->name = "add new document";
    // $objDocument->description = "This is a document to test adding a document";
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Document\Create($strDatabaseName, $objDocument);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Delete
    // $strDatabaseName = "db_test_non_partitioned";
    // $strDocID = '65bff5c363f3ec713bb2c2487c01ed7d';
    // $strRevision = "1-09b6dbbfc164248551f873fdf51f5aab";
    $strDatabaseName = "db_test";
    $strDocID = 'user_level:4';
    $strRevision = "1-09b6dbbfc164248551f873fdf51f5aab";
    $objRequest = new \AgileBM\PhpCouchDb\Request\Document\Delete($strDatabaseName, $strDocID, null, $strRevision);
    $objResponse =  $objConnection->Request($objRequest);
    echo $objResponse;
    
} catch (\AgileBM\PhpCouchDb\Exception $ex) {
    var_dump($ex->getMessage());
    var_dump($ex->getCode());
}
