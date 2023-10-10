<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class Create extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName, int $intShards = 2, int $intReplicas = 1, bool $boolPartitioned = false) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        $this->_data['intShards'] = (int)$intShards;
        $this->_data['intReplicas'] = (int)$intReplicas;
        $this->_data['boolPartitioned'] = (bool)$boolPartitioned;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'PUT';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'];
    }

    public function GetOptions(): array {
        return [
            'header' => [
                'Accept' => 'application/json'
            ],
            'query' => [
                'q' => $this->_data['intShards'],
                'n' => $this->_data['intReplicas'],
                'partitioned' => $this->_data['boolPartitioned']? 'true' : 'false',
            ]
        ];
    }
}