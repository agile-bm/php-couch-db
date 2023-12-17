<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class DocShard extends \AgileBM\PhpCouchDb\Request\Request {
    public function __construct(string $strDatabaseName, string $strDocumentID) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        $this->_data['strDocumentID'] = (string)$strDocumentID;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/'. $this->_data['strDatabaseName']. '/_shards/'. $this->_data['strDocumentID'];
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ];
        return $arrOption;
    }
}