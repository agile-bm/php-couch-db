<?php

namespace AgileBM\PhpCouchDb\Request\Document;

use AgileBM\PhpCouchDb\Request\Database\Query;

class GetDoc extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName,string $strDocumentID, Query $objQuery, string $strRevision = '') {
        $this->_data['strDatabaseName'] = $strDatabaseName;
        $this->_data['strDocumentID'] = $strDocumentID;
        $this->_data['objQuery'] = $objQuery;
        $this->_data['strRevision'] = $strRevision;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'] . '/' . $this->_data['strDocumentID'];
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json, multipart/related, multipart/mixed, text/plain'
            ]
        ];
        if (!empty($this->_data['strRevision'])) {
            $arrOption['headers']['If-None-Match'] = $this->_data['strRevision'];
        }

        
        if (!is_null($this->_data['objQuery'])) {
            $arrJson = $this->_data['objQuery']->GetJson();
            $arrQuery = $this->_data['objQuery']->GetQuery();

            if (!empty($arrJson) || !empty($arrQuery)) {
                $arrOption['query'] = array_merge($arrJson, $arrQuery);
            }
        }

        return $arrOption;
    }
}