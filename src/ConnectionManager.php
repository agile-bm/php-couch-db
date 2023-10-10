<?php

namespace AgileBM\PhpCouchDb;

class ConnectionManager extends Base {
    private static $_me = null;

    private $arrServer = [];
    private $arrConnection = [];

    /**
     * Singletone pattern constructor.
     */
    private function __construct() {
    }

    public static function Init() {
        if (is_null(self::$_me)) {
            self::$_me = new self();
        }
    }

    public static function AddServer(string $strKey, string $strBaseURI, int $intTimeout = 3): bool {
        if (is_null(self::$_me)) {
            self::Init();
        }

        return self::$_me->add($strKey, $strBaseURI, $intTimeout);
    }

    public static function &GetConnection(string $strKey): Connection {
        if (is_null(self::$_me)) {
            // Object is not initialized
            return false;
        }

        return self::$_me->connect($strKey);
    }

    public static function RemoveConnection(string $strKey): bool {
        if (is_null(self::$_me)) {
            // Object is not initialized
            return false;
        }

        return self::$_me->remove($strKey);
    }

    private function add(string $strKey, string $strBaseURI, int $intTimeout): bool {
        if (isset($this->arrServer[$strKey])) {
            if (isset($this->arrConnection[$strKey])) {
                // DSN already exists and connection established
                return false;
            }
        }

        // Connection added / updated
        $this->arrServer[$strKey] = [
            'strBaseURI' => $strBaseURI,
            'intTimeout' => $intTimeout,
        ];

        return true;
    }

    private function remove(string $strKey): bool {
        if (!isset($this->arrServer[$strKey])) {
            // Unknown key
            return true;
        }

        if (isset($this->arrConnection[$strKey])) {
            // Connection already established
            $DB = $this->arrConnection[$strKey];
            $DB->Close();

            unset($this->arrConnection[$strKey]);
        }

        unset($this->arrServer[$strKey]);

        return true;
    }

    private function &connect(string $strKey): Connection {
        if (!isset($this->arrServer[$strKey])) {
            // Unknown key
            return null;
        }

        if (isset($this->arrConnection[$strKey])) {
            // Connection already established
            return $this->arrConnection[$strKey];
        }

        // Establish Connection
        $arrParam = $this->arrServer[$strKey];
        $objConnection = new Connection($arrParam['strBaseURI'], $arrParam['intTimeout']);
        if (!$objConnection) {
            return null;
        }

        $this->arrConnection[$strKey] = $objConnection;

        return $this->arrConnection[$strKey];
    }
}
