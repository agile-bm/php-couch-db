<?php

namespace AgileBM\PhpCouchDb\Request\Authentication;

class CookieDestroy extends \AgileBM\PhpCouchDb\Request\Request {
    public function GetMethod(): string {
        return 'DELETE';
    }

    public function GetURI(): string {
        return '/_session';
    }

    public function GetOptions(): array {
        return [
            'header' => [
                'Accept' => 'application/json'
            ]
        ];
    }
}