<?php

namespace AgileBM\PhpCouchDb\Request\Authentication;

interface IAuthenticate extends \AgileBM\PhpCouchDb\Request\IRequest {
    public function GetAuthenticator(): Authenticator;
}