<?php
namespace Core;
use \PDO;
use \PDOException;

class DB {
    private static $_instance = null;
    private $_pdo, $_query, $_error = false, $_result, $_count = 0, $_lastInsertID = null;

    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function query($sql, $params = [], $class = false) {
        $this->_error = false;
        if ($this->_query = $this->_pdo->prepare($sql)) {
            $paramNumber = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->_query->bindValue($paramNumber, $param);
                    $paramNumber++;
                }
            }
            if ($this->_query->execute()) {
                if ($class) {
                    $this->_result = $this->_query->fetchAll(PDO::FETCH_CLASS, $class);
                } else {
                    $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
                }
                $this->_count = $this->_query->rowCount();
                $this->_lastInsertID = $this->_pdo->lastInsertId();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    protected function _read($table, $params = [], $class = false) {
        $conditionString = '';
        $bind = [];
        $order = '';
        $limit = '';

        //conditions
        if (isset($params['conditions'])) {
            if (is_array($params['conditions'])) {
                foreach ($params['conditions'] as $condition) {
                    $conditionString .= ' ' . $condition . ' AND';
                }
                $conditionString = trim($conditionString);
                $conditionString = rtrim($conditionString, ' AND');
            } else {
                $conditionString = $params['conditions'];
            }
            if ($conditionString != '')
                $conditionString = ' WHERE ' . $conditionString;
        }

        //bind
        if (array_key_exists('bind', $params)) {
            $bind = $params['bind'];
        }

        //order
        if (array_key_exists('order', $params)) {
            $order = ' ORDER BY ' . $params['order'];
        }
        //limit
        if (array_key_exists('limit', $params)) {
            $limit = ' LIMIT ' . $params['limit'];
        }
        $sql = "SELECT * FROM {$table}{$conditionString}{$order}{$limit}";
        if ($this->query($sql, $bind, $class)) {
            if ($this->count()) return true;
            return false;
        }
        return false;
    }

    public function find($table, $params = [], $class = false) {
        if ($this->_read($table, $params, $class)) {
            return $this->results();
        }
        return false;
    }

    public function findFirst($table, $params = [], $class = false) {
        if ($this->_read($table, $params,$class)) {
            return $this->first();
        }
        return false;
    }

    public function insert($table, $fields = []) {
        $fieldString = '';
        $valueString = '';
        $values = [];

        foreach ($fields as $field => $value) {
            $fieldString .= '`' . $field . '`,';
            $valueString .= '?,';
            $values[] = $value;
        }
        $fieldString = rtrim($fieldString, ',');
        $valueString = rtrim($valueString, ',');
        $sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";
        if (!$this->query($sql, $values)->error()) {
            return true;
        }
        return false;
    }

    public function update($table, $key, $id, $fields = []) {
        $fieldString = '';
        foreach ($fields as $field => $value) {
            $fieldString .= ' ' . $field . '=?,';
        }
        $fieldString = rtrim($fieldString, ',');
        $values = array_values($fields);
        $sql = "UPDATE {$table} SET {$fieldString} WHERE {$key}={$id}";
        if ($this->query($sql, $values)->error()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $key, $id) {
        $sql = "DELETE FROM {$table} WHERE {$key} = {$id}";
        if ($this->query($sql)->error())
            return true;
        return false;
    }

    public function results() {
        return $this->_result;
    }

    public function first() {
        return (!empty($this->_result)) ? $this->_result[0] : [];
    }

    public function count() {
        return $this->_count;
    }

    public function last() {
        return $this->_lastInsertID;
    }

    public function getColumns($table) {
        return $this->query("SHOW COLUMNS FROM {$table}")->results();
    }

    public function error() {
        return $this->_error;
    }

}