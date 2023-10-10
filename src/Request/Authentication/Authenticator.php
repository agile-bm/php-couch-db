<?php

namespace AgileBM\PhpCouchDb\Request\Authentication;

class Authenticator extends \AgileBM\PhpCouchDb\Base {
    public function __construct(string $strKey, $value) {
        $this->_data = [
            'strKey' => $strKey,
            'value' => $value,
        ];
    }

    public function __set($key, $value) {
        return false;
    }

    public function GetOption() {
        return [
            $this->_data['strKey'] => $this->_data['value']
        ];
    }
}