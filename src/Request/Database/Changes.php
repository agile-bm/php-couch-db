<?php

namespace AgileBM\PhpCouchDb\Request\Database;
use AgileBM\PhpCouchDb\Request\Query;

class Changes extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(string $strDatabaseName,  Query $objQuery,int $intLastEventID) {
        $this->_data['strDatabaseName'] = $strDatabaseName;
        $this->_data['intLastEventID'] = $intLastEventID;
        $this->_data['objQuery'] = $objQuery;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/' . $this->_data['strDatabaseName'] . '/_changes';
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ];
        if (!empty($this->_data['strLastEventID'])) {
            $arrOption['headers']['Last-Event-ID'] = $this->_data['strLastEventID'];
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