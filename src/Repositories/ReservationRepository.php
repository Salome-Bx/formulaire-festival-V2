<?php

namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Reservation;

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

    //* Create Reservation in Database
    function putReservationInDB($resa): bool
    {

        //* Put Reservation in Database
        $sql = "INSERT INTO festival_reservation (ID_RESERVATION, Number_Reservation, Quantity_Sledge, Quantity_Headphone, Children, Id_User, Price_Reduced) VALUES (:ID_RESERVATION, :Number_Reservation, :Quantity_Sledge, :Quantity_Headphone, :Children, :Id_User, :Price_Reduced)";

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":ID_RESERVATION" => null,
            ":Number_Reservation" => $resa->getNumberReservation(),
            ":Quantity_Sledge" => $resa->getQuantitySledge(),
            ":Quantity_Headphone" => $resa->getQuantityHeadphone(),
            ":Children" => $resa->getChildren(),
            ":Id_User" => $resa->getIdUser(),
            ":Price_Reduced" => $resa->getPriceReduced(),
        ]);


        //* Put Event Reservation in Database
        $lastInsertedId = $this->DB->lastInsertId();

        $sqlInsertReservationHasEvent = "INSERT INTO festival_reservationhasevent (Id_Date, ID_RESERVATION) VALUES (:Id_Date, :ID_RESERVATION)";
        $statement = $this->DB->prepare($sqlInsertReservationHasEvent);
        $statement->execute([
            ":Id_Date" => $resa->getIdDate(),
            ":ID_RESERVATION" => $lastInsertedId,
        ]);

        return $statement->rowCount() > 0;


        //* Put all options in Night Database
        $filteredArray = array_filter($resa, function ($key) {
            return strpos($key, 'tente') !== false || strpos($key, 'van') !== false;
        }, ARRAY_FILTER_USE_KEY);

        $sqlInsertReservationHasEvent = "INSERT INTO festival_reservationhasnight (Id_Date, ID_RESERVATION) VALUES (:Id_Date, :ID_RESERVATION)";
        $statement = $this->DB->prepare($sqlInsertReservationHasEvent);

        $lastInsertedId = $this->DB->lastInsertId();

        foreach ($filteredArray as $key => $value) {
            $date = $value;

            $statement->execute([
                ":Id_Date" => $date,
                ":ID_RESERVATION" => $lastInsertedId,
            ]);
        }

        //* Check if the last execute was successful
        return $statement->rowCount() > 0;
    }



    function getAllReservationFromDB(): array
    {
        $sql = "SELECT * FROM festival_reservation";


        $statement = $this->DB->getDB()->prepare($sql);
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


    function getEventFromDB()
    {
        $sql = "SELECT * FROM `festival_event`";

        $statement = $this->DB->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getNightFromDB()
    {
        $sql = "SELECT * FROM festival_night";

        $statement = $this->DB->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
