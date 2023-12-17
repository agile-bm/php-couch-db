<?php

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

    // Test Database changes
    // $strDatabaseName = "db_test";
    // $objQuery = new \AgileBM\PhpCouchDb\Request\Query();
    // $objQuery->SetFeed(\AgileBM\PhpCouchDb\Request\Query::FEED_PARAMETER_LONGPOLL);
    // // $objQuery->SetSince('now');
    // $objQuery->SetTimeout(200000);
    // $objQuery->SetIncludeDocs(true);
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\Changes($strDatabaseName, $objQuery, 0);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // $objQuery->SetFilter('_doc_ids');
    // $objQuery->SetDocIDs(['1:128']);
    
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\SpecChanges($strDatabaseName, $objQuery, 0);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Partition Info
    // $strDatabaseName = "db_test";
    // $strPartitionName = "user_level";
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\PartitionInfo($strDatabaseName, $strPartitionName);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Partition all docs
    // $strDatabaseName = "db_test";
    // $strPartitionName = "user_level";
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\PartitionAllDocs($strDatabaseName, $strPartitionName);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test list Shards 
    // $strDatabaseName = "db_test";
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\Shards($strDatabaseName);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test list Shards 
    // $strDatabaseName = "db_test_non_partitioned";
    // $strDocID = "65bff5c363f3ec713bb2c2487c005289";
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\DocShard($strDatabaseName, $strDocID);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test add bulk
    // $strDatabaseName = "db_test";
    // $arrDocument = [];
    // $objDocument = new \stdClass();
    // $objDocument->_id = "user_level:3";
    // $objDocument->name = "user level 3";
    // $objDocument->description = "This is a document to test adding bulk a document";    
    // $arrDocument[] = $objDocument;
    // $objDocument = new \stdClass();
    // $objDocument->_id = "user_level:4";
    // $objDocument->name = "user level 4";
    // $objDocument->description = "This is a document to test adding bulk a document";    
    // $arrDocument[] = $objDocument;
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\BulkDocs($strDatabaseName, $arrDocument);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Bulk Get
    // $strDatabaseName = 'db_test';
    // $arrDocument = [];
    // $objDocument = new \stdClass();
    // $objDocument->id = "user_level:3";
    // $arrDocument[] = $objDocument;
    // $objDocument = new \stdClass();
    // $objDocument->id = "user_level:4";
    // $arrDocument[] = $objDocument;
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\BulkGet($strDatabaseName, $arrDocument, null);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Get Design Doc
    // $strDatabaseName = 'db_test';
    // $objQuery = new \AgileBM\PhpCouchDb\Request\Query();
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\GetDesignDocs($strDatabaseName, $objQuery);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Get Design Doc
    // $strDatabaseName = 'db_test';
    // $objQuery = new \AgileBM\PhpCouchDb\Request\Query();
    // $objQuery->SetLimit(5);
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\DesignDocs($strDatabaseName, $objQuery);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Partition all docs
    // $strDatabaseName = "db_test";
    // $strPartitionName = "user_level";
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\PartitionAllDocs($strDatabaseName, $strPartitionName);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;
    
    // Test Partition Query
    // $strDatabaseName = "db_test";
    // $strPartitionName = "user_level";
    // $objQuery = new \AgileBM\PhpCouchDb\Request\Query();
    // $objQuery->SetLimit(5);
    // $objQuery->SetSelector([
    //     'name' => 'Manager'
    // ]);
    // $objRequest = new \AgileBM\PhpCouchDb\Request\Database\PartitionQuery($strDatabaseName, $strPartitionName, $objQuery);
    // $objResponse =  $objConnection->Request($objRequest);
    // echo $objResponse;

    // Test Find
    $strDatabaseName = "db_test";
    $objQuery = new \AgileBM\PhpCouchDb\Request\Query();
    $objQuery->SetLimit(5);
    $objQuery->SetSelector([
        'name' => 'Manager'
    ]);
    $objRequest = new \AgileBM\PhpCouchDb\Request\Database\Find($strDatabaseName, $objQuery);
    $objResponse =  $objConnection->Request($objRequest);
    echo $objResponse;

} catch (\AgileBM\PhpCouchDb\Exception $ex) {
    var_dump($ex->getMessage());
    var_dump($ex->getCode());
}
