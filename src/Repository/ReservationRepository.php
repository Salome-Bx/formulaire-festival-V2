<?php

use src\Models\Reservation;
use src\Models\Database;

class ReservationRepository
{
    private $DB;
    private $resa;
    public function __construct()
    {

        $database = new Database();
        $this->DB = $database->getDB();
        $this->resa = new Reservation();

        require_once __DIR__ . '/../../config.php';
    }
    function putReservationInDB(): bool
    {
        $sql = "INSERT INTO festival_reservation (ID_RESERVATION, Number_Reservation, Quantity_Sledge, Quantity_Headphone, Children, Id_User) VALUES (:ID_RESERVATION, :Number_Reservation, :Quantity_Sledge, :Quantity_Headphone, :Children, :Id_User)";

        $statement = $this->DB->getDB()->prepare($sql);
        $statement->execute([":ID_RESERVATION" => $this->resa->getIdReservation()]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getReservationFromDB(): Returntype
    {
    }
}
