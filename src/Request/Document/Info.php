<?php

namespace AgileBM\PhpCouchDb\Request\Document;

class Info extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName,string $strDocumentID, string $strRevision = '') {
        $this->_data['strDatabaseName'] = $strDatabaseName;
        $this->_data['strDocumentID'] = $strDocumentID;
        $this->_data['strRevision'] = $strRevision;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'HEAD';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'] . '/' . $this->_data['strDocumentID'];
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ];
        if (!empty($this->_data['strRevision'])) {
            $arrOption['headers']['If-None-Match'] = $this->_data['strRevision'];
        }

        return $arrOption;
    }
}