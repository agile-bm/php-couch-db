<?php

namespace AgileBM\PhpCouchDb\Request\Server;

class Uuids extends \AgileBM\PhpCouchDb\Request\Request {
    public function __construct(int $intCount = 1) {
        $this->_data['intCount'] = (int)$intCount;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/_uuids';
    }

    public function GetOptions(): array {
        return [
            'header' => [
                'Accept' => 'application/json'
            ],
            'query' => [
                'count' => $this->_data['intCount']
            ]
        ];
    }
}