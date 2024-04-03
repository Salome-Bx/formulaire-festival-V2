<?php

namespace src\Models;

use src\Services\Hydratation;


class Reservation
{
    private int|null $IdReservation = null;
    private int $NumberReservation;
    private int $Children;
    private int $QuantityHeadphone;
    private int $QuantitySledge;
    private int $IdUser;


    use Hydratation;



    /**
     * Get the value of IdReservation
     */
    public function getIdReservation(): int|null
    {
        return $this->IdReservation;
    }

    /**
     * Set the value of IdReservation
     */
    public function setIdReservation(int $IdReservation): self
    {
        $this->IdReservation = $IdReservation;

        return $this;
    }

    /**
     * Get the value of NumberReservation
     */
    public function getNumberReservation(): int
    {
        return $this->NumberReservation;
    }

    /**
     * Set the value of NumberReservation
     */
    public function setNumberReservation(int $NumberReservation): self
    {
        $this->NumberReservation = $NumberReservation;

        return $this;
    }

    /**
     * Get the value of Children
     */
    public function getChildren(): int
    {
        return $this->Children;
    }

    /**
     * Set the value of Children
     */
    public function setChildren(int $Children): self
    {
        $this->Children = $Children;

        return $this;
    }

    /**
     * Get the value of QuantityHeadphone
     */
    public function getQuantityHeadphone(): int
    {
        return $this->QuantityHeadphone;
    }

    /**
     * Set the value of QuantityHeadphone
     */
    public function setQuantityHeadphone(int $QuantityHeadphone): self
    {
        $this->QuantityHeadphone = $QuantityHeadphone;

        return $this;
    }

    /**
     * Get the value of QuantitySledge
     */
    public function getQuantitySledge(): int
    {
        return $this->QuantitySledge;
    }

    /**
     * Set the value of QuantitySledge
     */
    public function setQuantitySledge(int $QuantitySledge): self
    {
        $this->QuantitySledge = $QuantitySledge;

        return $this;
    }

    /**
     * Get the value of IdUser
     */
    public function getIdUser(): int
    {
        return $this->IdUser;
    }

    /**
     * Set the value of IdUser
     */
    public function setIdUser(int $IdUser): self
    {
        $this->IdUser = $IdUser;
        return $this;
    }
}
