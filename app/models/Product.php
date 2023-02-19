<?php
namespace App\Models;
class Product extends BaseModel
{
    public $table ;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'products';
    }

    public function getProducts($id = null)
    {
        if ($id) {
            $sql = "SELECT * FROM $this->table WHERE id = $id";
            $this->setQuery($sql);
            return $this->loadRow();
        } else {
            $sql = "SELECT * FROM $this->table";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
    }
//    public function addProduct($name, $price, $description)
//    {
//        $sql = "INSERT INTO $this->table (name, price, description) VALUES ('$name', '$price', '$description')";
//        $this->setQuery($sql);
//        return $this->execute();
//    }
    public function addProduct($data)
    {
        extract($data);
        $sql = "INSERT INTO $this->table (name, price, description) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($name, $price, $description));
    }
    public function updateProduct($data){
        extract($data);
        $sql = "UPDATE $this->table SET name = ?, price = ?, description = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute(array($name, $price, $description,$id));
    }
    public function deleteProduct($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}
