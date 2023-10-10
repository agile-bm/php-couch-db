<?php

namespace AgileBM\PhpCouchDb\Request\Database;

class AllDocs extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName, Query $objQuery = null) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        $this->_data['objQuery'] = $objQuery;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'POST';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'] . '/_all_docs';
    }

    public function GetOptions(): array {
        $arrOption = [
            'header' => [
                'Accept' => 'application/json'
            ]
        ];

        if (!is_null($this->_data['objQuery'])) {
            $arrJson = $this->_data['objQuery']->GetJson();
            $arrQuery = $this->_data['objQuery']->GetQuery();

            if (!empty($arrJson) || !empty($arrQuery)) {
                $arrOption['json'] = array_merge($arrJson, $arrQuery);
            }

            // if (!empty($arrQuery)) {
            //     $arrOption['query'] = $arrQuery;
            // }

            // if (!empty($arrJson)) {
            //     $arrOption['json'] = $arrJson;
            // }
        }

        if (!isset($arrOption['json'])) {
            $arrOption['json'] = [
                'sorted' => 'true',
            ];
        }
        return $arrOption;
    }
}