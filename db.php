<?php

require_once 'config.php';

class DataBase extends Config
{
    public function insert($name, $author, $page, $genre){
        $sql = 'INSERT INTO books (name, author, page, genre) VALUES (:name, :author, :page, :genre)';
        $stmt = $this->conn->prepare($sql);
        $stmt ->execute([
            ':name'=>$name,
            ':author'=>$author,
            ':page'=>$page,
            ':genre'=> $genre
        ]);
        return true;
    }

    public function read(){
        $sql = 'SELECT * FROM books';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function select($id){
        $sql = 'SELECT * FROM books WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt ->execute([
            ':id'=> $id
        ]);
        $result = $stmt->fetch();
        return $result;
    }
    
    public function update($id, $name, $author, $page, $genre){
        $sql = 'UPDATE books SET name = :name, author = :author, page = :page, genre = :genre WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name'=>$name,
            ':author'=>$author,
            ':page'=>$page,
            ':genre'=> $genre
        ]);
        return true;
    }   
    
    public function delete($id){
        $sql = 'DELETE FROM books WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
           ':id' => $id
        ]);
        return true;
    }

    public function search($name){
        $sql = 'SELECT * FROM books WHERE name LIKE :name';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':name' => '%' . $name . '%'
        ]);
        $result = $stmt->fetchAll();
        return $result;
    }
}

?>
