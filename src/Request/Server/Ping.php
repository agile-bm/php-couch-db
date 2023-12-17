<?php

namespace AgileBM\PhpCouchDb\Request\Server;

class Ping extends \AgileBM\PhpCouchDb\Request\Request {
    
    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/_up';
    }
}