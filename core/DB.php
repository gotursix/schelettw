<?php

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
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql, $params = []) {
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
                $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
                $this->_lastInsertID = $this->_pdo->lastInsertId();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    public function find($table, $params = []) {

    }

    public function findFirst(){

    }

    public function insert($table, $fields = []) {
        $valuesArr = array_fill_keys($fields, '?');
        $fieldString = implode(', ', array_keys($fields));
        $valueString = implode(', ', $valuesArr);
        $values = array_values($fields);
        $sql = "INSERT INTO {$table} ({$fieldString}) VALUES ($valueString)";
        if (!$this->query($sql, $values)->error())
            return true;
        return false;
    }

    public function update($table, $id, $key, $fields = []) {
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
        return $this->count();
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