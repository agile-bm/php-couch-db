<?php

namespace AgileBM\PhpCouchDb\Request\Authentication;

abstract class Authenticate extends \AgileBM\PhpCouchDb\Request\Request implements \AgileBM\PhpCouchDb\Request\Authentication\IAuthenticate {
    public function __construct(string $strUsername, string $strPassword) {
        $this->_data['strUsername'] = (string)$strUsername;
        $this->_data['strPassword'] = (string)$strPassword;
        $this->_data['objAuthenticator'] = $this->GetAuthenticator();
        parent::__construct();
    }
}