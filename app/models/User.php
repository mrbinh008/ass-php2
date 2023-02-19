<?php
namespace App\Models;

class User extends BaseModel{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'user';
    }
    public function getUser($id = null){
        if($id){
            $sql = "SELECT * FROM $this->table WHERE id = $id";
            $this->setQuery($sql);
            return $this->loadRow();
        }else{
            $sql = "SELECT * FROM $this->table";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
    }
    public function addUser($data){
        extract($data);
        $sql = "INSERT INTO $this->table (username, password, fullname, role)  VALUES (?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($username, md5($password), $fullname, $role));
    }
    public function updateUser($data){
        extract($data);
        $sql = "UPDATE $this->table SET username = ?, password = ?,  fullname = ?, role =? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute(array($username, md5($password), $fullname, $role, $id));
    }
    public function deleteUser($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}