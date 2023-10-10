<?php

namespace AgileBM\PhpCouchDb\Request;

abstract class Request extends \AgileBM\PhpCouchDb\Base implements \AgileBM\PhpCouchDb\Request\IRequest {
    public function __construct() {
        $this->_data['strMethod'] = $this->GetMethod();
        $this->_data['strURI'] = $this->GetURI();
        $this->_data['arrOption'] = $this->GetOptions();
    }

    public function __set($key, $value) {
        return false;
    }

    public function GetOptions(): array {
        return [];
    }

    public function AddOption($strKey, $value) {
        $this->_data['arrOption'][$strKey] = $value;
    }

    public function RemOption($strKey) {
        unset($this->_data['arrOption'][$strKey]);
    }
}