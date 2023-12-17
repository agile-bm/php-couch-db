<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class Shards extends \AgileBM\PhpCouchDb\Request\Request {
    public function __construct(string $strDatabaseName) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/'. $this->_data['strDatabaseName']. '/_shards';
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