<?php

namespace AgileBM\PhpCouchDb\Request\Authentication;

class Cookie extends \AgileBM\PhpCouchDb\Request\Authentication\Authenticate {
    public function __construct($strUsername, $strPassword) {
        $this->_data['objCookieJar'] = new \GuzzleHttp\Cookie\CookieJar();
        parent::__construct($strUsername, $strPassword);
    }

    public function GetMethod(): string {
        return 'POST';
    }

    public function GetURI(): string {
        return '/_session';
    }

    public function GetOptions(): array {
        return [
            'header' => [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                "name" => $this->_data['strUsername'],
                "password" => $this->_data['strPassword']
            ],
            'cookies' => $this->objCookieJar
        ];
    }

    public function GetAuthenticator(): Authenticator {
        return new Authenticator('cookies', $this->objCookieJar);
    }
}