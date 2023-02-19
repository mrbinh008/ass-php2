<?php
namespace App\Models;
class Auth extends BaseModel
{
    public function login($username,$password)
    {
        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($username, md5($password)));
    }
}
