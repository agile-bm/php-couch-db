<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class MultipleQueries extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName,array $arrQuery) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        $this->_data['arrQuery'] = $arrQuery;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'POST';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'] . '/_all_docs/queries';
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ];
        
        $arrOption['json']['queries'] = $this->_data['arrQuery'];
        return $arrOption;
    }
}