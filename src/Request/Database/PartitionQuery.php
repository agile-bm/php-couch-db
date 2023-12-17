<?php

namespace AgileBM\PhpCouchDb\Request\Database;

use AgileBM\PhpCouchDb\Request\Query;

class PartitionQuery extends \AgileBM\PhpCouchDb\Request\Request {
    
    public function __construct(string $strDatabaseName, string $strPartitionName, Query $objQuery) {
        $this->_data['strDatabaseName'] = (string)$strDatabaseName;
        $this->_data['strPartitionName'] = (string)$strPartitionName;
        $this->_data['objQuery'] = $objQuery;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'POST';
    }

    public function GetURI(): string {
        return '/'. $this->_data['strDatabaseName']. '/_partition/'. $this->_data['strPartitionName'].'/_find';
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json'
            ]
        ];

        if (!is_null($this->_data['objQuery'])) {
            $arrJson = $this->_data['objQuery']->GetJson();
            $arrQuery = $this->_data['objQuery']->GetQuery();

            if (!empty($arrJson) || !empty($arrQuery)) {
                $arrOption['json'] = array_merge($arrJson, $arrQuery);
            }
        }

        return $arrOption;
    }

}