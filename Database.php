<?php

// Method chining
class Database {
    private $query;

    public function select($field){
        $this->query = "SELECT $field";
        return $this;
    }

    public function from($tabel){
        $this->query .= "FROM $tabel";
        return $this;
    }

    public function where($condition){
        $this->query .= "WHERE $condition";
        return $this;
    }

    public function getQuery(){
        return $this->query;
    }
}