<?php

namespace AgileBM\PhpCouchDb;

class Base {
    protected $_data = [];

    public function __construct() {
    }

    public function __set($name, $value) {
        $this->_data[$name] = $value;
    }

    public function __get($name) {
        if (array_key_exists($name, $this->_data)) {
            return $this->_data[$name];
        }

        return null;
    }

    public function __isset($name) {
        $value = $this->__get($name);

        return isset($value);
    }

    public function __unset($name) {
        if (array_key_exists($name, $this->_data)) {
            unset($this->_data[$name]);
        }
    }

    public function __toString() {
        $str = json_encode($this->ToArray(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        if (PHP_SAPI == 'cli') {
            return $str.PHP_EOL;
        }

        return '<pre>'.$str.'</pre>';
    }

    public function ToJson() {
        $arr = $this->ToArray();

        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }

    public function ToArray() {
        $arrRslt = [];
        $arrData = $this->_data;
        foreach ($arrData as $key => $value) {
            if (is_a($value, __CLASS__)) {
                $arrRslt[$key] = $value->ToArray();
            } elseif (is_array($value)) {
                $arrRslt[$key] = $this->arrayToArray($value);
            } elseif (is_bool($value)) {
                $arrRslt[$key] = $value ? 'true' : 'false';
            } else {
                $arrRslt[$key] = $value;
            }
        }

        return $arrRslt;
    }

    private function arrayToArray($arr) {
        $arrRslt = [];

        foreach ($arr as $k => $v) {
            if (is_a($v, __CLASS__)) {
                $arrRslt[$k] = $v->ToArray();
            } elseif (is_array($v)) {
                $arrRslt[$k] = $this->arrayToArray($v);
            } elseif (is_bool($v)) {
                $arrRslt[$k] = $v ? 'true' : 'false';
            } else {
                $arrRslt[$k] = $v;
            }
        }

        return $arrRslt;
    }
}
