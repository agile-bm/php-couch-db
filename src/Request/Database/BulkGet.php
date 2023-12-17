<?php

namespace AgileBM\PhpCouchDb\Request\Database;
use AgileBM\PhpCouchDb\Request\Query;

class BulkGet extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName, array $arrDocument, Query $objQuery = null) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        $this->_data['arrDocument'] = $arrDocument;
        $this->_data['objQuery'] = $objQuery;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'POST';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'] . '/_bulk_get';
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json, multipart/related, multipart/mixed',
                'Content-Type' => 'application/json'
            ]
        ];
        if (!is_null($this->_data['objQuery'])) {
            $arrJson = $this->_data['objQuery']->GetJson();
            $arrQuery = $this->_data['objQuery']->GetQuery();

            if (!empty($arrJson) || !empty($arrQuery)) {
                $arrOption['query'] = array_merge($arrJson, $arrQuery);
            }
        }
        $arrOption['json']['docs'] = $this->_data['arrDocument'];
        return $arrOption;
    }
}