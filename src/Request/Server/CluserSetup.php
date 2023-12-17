<?php

namespace AgileBM\PhpCouchDb\Request\Server;

class AllDBs extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(\stdClass $objClusterOption) {
        $this->_data['objClusterOption'] = $objClusterOption;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'POST';
    }

    public function GetURI(): string {
        return '/_cluster_setup';
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ],
            'json' => $this->_data['objClusterOption'],
        ];

  

        return $arrOption;
    }
}