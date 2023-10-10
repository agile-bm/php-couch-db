<?php

namespace AgileBM\PhpCouchDb\Request\Server;

class Info extends \AgileBM\PhpCouchDb\Request\Request {
    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '';
    }

    public function GetHeaders(): array {
        return [
            'header' => [
                'Accept' => 'application/json'
            ]
        ];
    }
}