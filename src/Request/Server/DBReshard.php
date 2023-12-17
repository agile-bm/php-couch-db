<?php

namespace AgileBM\PhpCouchDb\Request\Server;

class DBReshard extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct() {
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/_reshard'; 
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ];

        return $arrOption;
    }
}