<?php

namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Event;

class EventRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }
    public function getAllEventDate()
    {
        $sql = 'SELECT * FROM' . PREFIXE . ' event';

        $statement = $this->DB->prepare($sql);
        $statement->execute();

        $statement->fetchAll(PDO::FETCH_CLASS, Event::class);
        return $statement;
    }
    public function getThisEventDate(int $IdDate)
    {
        $sql = 'SELECT * FROM' . PREFIXE . ' event WHERE Id_Date = :ID_Date';


        $statement = $this->DB->prepare($sql);
        $statement->execute([':Id_Date' => $IdDate]);
        $statement->setFetchMode(PDO::FETCH_CLASS, Event::class);
        $statement->fetch();

        return $statement;
    }
}
