<?php

namespace AgileBM\PhpCouchDb\Request\Authentication;

class Basic extends \AgileBM\PhpCouchDb\Request\Authentication\Authenticate {
    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '';
    }

    public function GetOptions(): array {
        return [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'auth' => [
                $this->_data['strUsername'],
                $this->_data['strPassword'],
                'basic'
            ]
        ];
    }

    public function GetAuthenticator(): Authenticator {
        return new Authenticator('auth', [$this->_data['strUsername'], $this->_data['strPassword'], 'basic']);
    }
}