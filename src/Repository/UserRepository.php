<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\User;
use PDO;
use PDOException;

class UserRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }


    public function saveUser(User $user): User
    {
        $sql = "INSERT INTO " . PREFIXE . "user (lastName, firstName, password, address, telephone, User_Role, mail) VALUES (:lastName, :firstName, :password, :address, :telephone, :User_Role, :mail)";

        $statement = $this->DB->prepare($sql);

        $statement->execute([
            ':lastName' => $user->getLastName(),
            ':firstName' => $user->getFirstName(),
            ':password' => $user->getPassword(),
            ':address' => $user->getAddress(),
            ':telephone' => $user->getTelephone(),
            ':User_Role' => $user->isUserRole(),
            ':mail' => $user->getMail()
        ]);

        $user->setId($this->DB->lastInsertId());

        return $user;
    }

    public function userExist(User $user)
    {
        $sql = "SELECT * FROM festival_user WHERE mail = :mail";
        $mail = $user->getMail();
        $statement = $this->DB->prepare($sql);
        $statement->execute([':mail' => $mail]);

        if ($statement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
