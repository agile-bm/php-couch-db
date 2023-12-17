<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class Info extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'];
    }

    public function GetOptions(): array {
        return [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ];
    }
}