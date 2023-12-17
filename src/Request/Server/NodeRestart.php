<?php

namespace AgileBM\PhpCouchDb\Request\Server;

class NodeRestart extends \AgileBM\PhpCouchDb\Request\Request {

    public function __construct($strNodeName) {
        $this->_data['strNodeName'] = $strNodeName;
        parent::__construct();
    }

    public function GetMethod(): string {
        return 'POST';
    }

    public function GetURI(): string {
        return '/_node/'. $this->_data['strNodeName'] .'/_restart';
    }

}