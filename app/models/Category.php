<?php
namespace App\Models;
class Category extends BaseModel {

    public $table ;
    public function __construct()
    {
        parent::__construct();
        $this->table = 'categories';
    }
    public function getCategories($id = null){
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
    public function addCategory($data){
        extract($data);
        $sql = "INSERT INTO $this->table (name, description) VALUES (?,?)";
        $this->setQuery($sql);
        return $this->execute(array($name,$description));
    }
    public function updateCategory($data){
        extract($data);
        $sql = "UPDATE $this->table SET name = ?, description = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute(array($name,$description,$id));
    }
    public function deleteCategory($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}