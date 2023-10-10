<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class Exists extends \AgileBM\PhpCouchDb\Request\Request {
    public function __construct(string $strDatabaseName) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'HEAD';
    }

    public function GetURI(): string {
        return $this->_data['strDatabaseName'];
    }
}