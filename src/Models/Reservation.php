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
    private int $IdDate;
    private int $nightTent;
    private int $nightVan;
    private bool $PriceReduced = false;

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
     * Get the value of IdDate
     */
    public function getIdDate(): int
    {
        return $this->IdDate;
    }

    /**
     * Set the value of IdDate
     */
    public function setIdDate(int $IdDate): self
    {
        $this->IdDate = $IdDate;

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

    /**
     * Get the value of nightVan
     */
    public function getNightVan(): int
    {
        return $this->nightVan;
    }

    /**
     * Set the value of nightVan
     */
    public function setNightVan(int $nightVan): self
    {
        $this->nightVan = $nightVan;

        return $this;
    }


    /**
     * Get the value of PriceReduced
     */
    public function getPriceReduced(): bool
    {
        return $this->PriceReduced;
    }

    /**
     * Set the value of PriceReduced
     */
    public function setPriceReduced(bool $PriceReduced): self
    {
        $this->PriceReduced = $PriceReduced;

        return $this;
    }
}
