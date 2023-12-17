<?php

namespace AgileBM\PhpCouchDb\Request\Server;

class DBInfo extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct(\AgileBM\PhpCouchDb\Request\Query $objQuery) {
        $this->_data['objQuery'] = $objQuery;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'POST';
    }

    public function GetURI(): string {
        return '/_dbs_info';
    }

    public function GetOptions(): array {
        $arrOption = [
            'headers' => [
                'Accept' => 'application/json'
            ],
        ];

        if (!is_null($this->_data['objQuery'])) {
            $arrJson = $this->_data['objQuery']->GetJson();
            $arrOption['json'] = $arrJson;
        }

        return $arrOption;
    }
}