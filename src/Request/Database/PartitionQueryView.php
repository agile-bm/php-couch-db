<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class PartitionQueryView extends \AgileBM\PhpCouchDb\Request\Request {
    public function __construct(string $strDatabaseName, string $strPartitionName, string $strDocumentID, string $strViewName) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        $this->_data['strPartitionName'] = (string)$strPartitionName;
        $this->_data['strDocumentID'] = (string)$strDocumentID;
        $this->_data['strViewName'] = (string)$strViewName;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/'. $this->_data['strDatabaseName']. '/_partition/'. $this->_data['strPartitionName'].'/_design/'.$this->_data['strDocumentID']. '/_view/'. $this->_data['strViewName'];
    }
}