<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class PartitionAllDocs extends \AgileBM\PhpCouchDb\Request\Request {
    public function __construct(string $strDatabaseName, string $strPartitionName) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        $this->_data['strPartitionName'] = (string)$strPartitionName;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/'. $this->_data['strDatabaseName']. '/_partition/'. $this->_data['strPartitionName'].'/_all_docs';
    }

}