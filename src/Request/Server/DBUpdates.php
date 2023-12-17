<?php

namespace AgileBM\PhpCouchDb\Request\Server;

class DBUpdates extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(\AgileBM\PhpCouchDb\Request\Query $objQuery) {
        $this->_data['objQuery'] = $objQuery;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'GET';
    }

    public function GetURI(): string {
        return '/_dbs_Updates';
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json'
            ],
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