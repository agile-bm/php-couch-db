<?php

namespace AgileBM\PhpCouchDb\Request\Server;

class DBReplicate extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(\stdClass $objReplicationData) {
        $this->_data['objReplicationData'] = $objReplicationData;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'POST';
    }

    public function GetURI(): string {
        return '/_replicate'; 
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'json' => $this->_data['objReplicationData'],
        ];

        return $arrOption;
    }
}