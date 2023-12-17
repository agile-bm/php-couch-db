<?php

namespace AgileBM\PhpCouchDb\Request\Database;
use AgileBM\PhpCouchDb\Request\Query;

class GetDesignDocs extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName, Query $objQuery) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        $this->_data['objQuery'] = $objQuery;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'] . '/_design_docs';
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json, text/plain'
            ]
        ];

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