<?php

namespace AgileBM\PhpCouchDb;

class Response extends Base {
    public function __construct() {
        $this->_data = [
            'intStatusCode' => 0,
            'strReasonPhrase' => '',
            'arrHeader' => [],
            //'strBody' => '',
            'arrBody' => [],
        ];
    }

    public function __set($key, $value) {
        return false;
    }

    public function Load(int $intStatusCode, string $strReasonPhrase, string $strBody, array $arrHeader = []) : bool {
        $this->_data['intStatusCode'] = (int)$intStatusCode;
        $this->_data['strReasonPhrase'] = $strReasonPhrase;
        $this->_data['arrHeader'] = $arrHeader;
        //$this->_data['strBody'] = $strBody;
        $this->_data['arrBody'] = json_decode($strBody, true);

        return true;
    }
}