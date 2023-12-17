<?php

namespace AgileBM\PhpCouchDb\Request\Server;

class Membership extends \AgileBM\PhpCouchDb\Request\Request {

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/_membership';
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json'
            ],
        ];

        return $arrOption;
    }
}