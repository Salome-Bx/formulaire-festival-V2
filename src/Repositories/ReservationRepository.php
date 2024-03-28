<?php

namespace src\Repositories;

use PDO;
use src\Models\Reservation;
use src\Models\Database;


class ReservationRepository
{
    private Database $DB;
    private Reservation $resa;
    public function __construct()
    {

        $database = new Database();
        $this->DB = $database->getDB();
        $this->resa = new Reservation();

        require_once __DIR__ . '/../../config.php';
    }
    //* Create Reservation in Database
    function putReservationInDB(): bool
    {
        $sql = "INSERT INTO festival_reservation (ID_RESERVATION, Number_Reservation, Quantity_Sledge, Quantity_Headphone, Children, Id_User) VALUES (:ID_RESERVATION, :Number_Reservation, :Quantity_Sledge, :Quantity_Headphone, :Children, :Id_User)";


        $statement = $this->DB->getDB()->prepare($sql);
        $reservation = $this->resa;
        $statement->execute([
            ":ID_RESERVATION" => $reservation->getIdReservation(),
            ":Number_Reservation" => $reservation->getQuantitySledge(),
            ":Quantity_Sledge" => $reservation->getQuantitySledge(),
            "Quantity_Headphone" => $reservation->getQuantityHeadphone(),
            ":Children" => $reservation->getChildren(),
            "iD_User" => $reservation->getIdUser()
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    //* Read Reservation from Database
    function getReservationFromDB($Id_User): array
    {
        $sql = "SELECT * FROM festival_reservation WHERE :Id_User";


        $statement = $this->DB->getDB()->prepare($sql);
        $statement->execute([
            ":Id_User" => $Id_User
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    //* Edit Reservation in Database
    function edtiReservationInDB($Id_User): bool
    {
        $sql = "UPDATE festival_reservation SET Number_Reservation = :Number_Reservation, Quantity_Sledge = :Quantity_Sledge, Quantity_Headphone = :Quantity_Headphone, Children = :Children WHERE Id_User = :Id_User";

        $statement = $this->DB->getDB()->prepare($sql);
        $reservation = $this->resa;
        $statement->execute([
            ":Number_Reservation" => $reservation->getQuantitySledge(),
            ":Quantity_Sledge" => $reservation->getQuantitySledge(),
            ":Quantity_Headphone" => $reservation->getQuantityHeadphone(),
            ":Children" => $reservation->getChildren(),
            ":Id_User" => $Id_User
        ]);
        return $statement->rowCount() > 0;
    }


    //* Delete Reservation in Database
    function deleteReservationInDB($Id_User): bool
    {
        $sql = "DELETE FROM festival_reservation WHERE Id_User = :Id_User";

        $statement = $this->DB->getDB()->prepare($sql);
        $reservation = $this->resa;
        $statement->execute([
            ":Id_User" => $Id_User
        ]);
        return $statement->rowCount() > 0;
    }
}
