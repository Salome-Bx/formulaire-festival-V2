<?php

namespace src\Models;

use src\Services\Hydratation;


class Reservation
{
    private int $NumberReservation;
    private bool $Children;
    private int|null $QuantityHeadphone = null;
    private int|null $QuantitySledge = null;
    private int $IdUser = 1;
    private int $passJour;
    private int $nightTent;
    private int $nightVan;

    use Hydratation;



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
    public function getChildren(): bool
    {
        return $this->Children;
    }

    /**
     * Set the value of Children
     */
    public function setChildren(bool $Children): self
    {
        $this->Children = $Children;

        return $this;
    }

    /**
     * Get the value of QuantityHeadphone
     */
    public function getQuantityHeadphone(): ?int
    {
        return $this->QuantityHeadphone;
    }

    /**
     * Set the value of QuantityHeadphone
     */
    public function setQuantityHeadphone(?int $QuantityHeadphone): self
    {
        $this->QuantityHeadphone = $QuantityHeadphone;

        return $this;
    }

    /**
     * Get the value of QuantitySledge
     */
    public function getQuantitySledge(): ?int
    {
        return $this->QuantitySledge;
    }

    /**
     * Set the value of QuantitySledge
     */
    public function setQuantitySledge(?int $QuantitySledge): self
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

    /**
     * Get the value of passJour
     */
    public function getPassJour(): int
    {
        return $this->passJour;
    }

    /**
     * Set the value of passJour
     */
    public function setPassJour(int $passJour): self
    {
        $this->passJour = $passJour;

        return $this;
    }

    /**
     * Get the value of nightTent
     */
    public function getNightTent(): int
    {
        return $this->nightTent;
    }

    /**
     * Set the value of nightTent
     */
    public function setNightTent(int $nightTent): self
    {
        $this->nightTent = $nightTent;

        return $this;
    }
}
