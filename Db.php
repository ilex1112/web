<?php

//Класс для работы с базой данных mysql через PDO

class Db
{   
    private $db;
    private $table;

    public function __construct($db, $table)
    {
        $this->db = $db;
        $this->table = $table;
    }

    //Подключение к mysql
    private function connect(){
        return new PDO("mysql:host=localhost", "root", "");
    }
    
    //Подключение к базе данных mysql
    private function connect_table(){
        return new PDO("mysql:host=localhost;dbname=$this->db", "root", "");
    }

    //Создание базы данных
    public function create(){
        $sql = "CREATE DATABASE $this->db";
        return $this->connect()->exec($sql);
    }

    //Удаление базы данных
    public function drop(){
        $sql = "DROP DATABASE $this->db";
        return $this->connect()->exec($sql);
    }

    //Создание таблицы в базе данных
    public function create_table($column){
        $sql = "CREATE TABLE $this->table $column;";
        return $this->connect_table()->exec($sql);
    }

    //Добавление данных в таблицу (id, name, pass) VALUES (1, \'ilex\', 12345)
    public function insert_table($column){
        $sql = "INSERT INTO $this->table $column;";
        return $this->connect_table()->exec($sql);
    }

    //Извлечение всех данных из таблицы через переменную с методом fetch
    public function select(){
        $sql = "SELECT * FROM $this->table";
        return $this->connect_table()->query($sql);
    }

    //Извлечение 1 данных из таблицы через переменную
    public function select_id($id){
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        return $this->connect_table()->query($sql)->fetch();
    }

    //Обновление данных в таблице для конкретного id, в формате $column = (name = \'ilex\')
    public function update($column, $id){
        $sql = "UPDATE $this->table SET $column WHERE id = $id";
        return $this->connect_table()->exec($sql);
    }

    //Удаленние данных из таблицы по id
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->connect_table()->exec($sql);
    }
}


