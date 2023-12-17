<?php

namespace AgileBM\PhpCouchDb\Request\Document;

class Create extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName, \stdClass $objDocument, bool $boolBatchMode = false) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        $this->_data['objDocument'] = $objDocument;
        $this->_data['boolBatchMode'] = $boolBatchMode;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'POST';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'];
    }

    public function GetOptions(): array {
        return [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'query' => [
                'batch' => ($this->_data['boolBatchMode'])? 'ok' : 'nok'
            ],
            'json' => $this->_data['objDocument'],
        ];
    }
}