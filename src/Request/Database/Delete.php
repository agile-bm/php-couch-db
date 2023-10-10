<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class Delete extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'Delete';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'];
    }

    public function GetOptions(): array {
        return [
            'header' => [
                'Accept' => 'application/json'
            ]
        ];
    }
}