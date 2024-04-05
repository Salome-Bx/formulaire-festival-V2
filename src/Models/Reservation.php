<?php

namespace src\Models;

use src\Services\Hydratation;


class Reservation
{
    public int $NumberReservation;
    public bool $Children;
    public int|null $QuantityHeadphone = null;
    public int|null $QuantitySledge = null;
    public  $IdUser;
    public int $IdDate;
    public array $Tente;
    public array $Van;
    public bool $PriceReduced = false;

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
    public function getIdUser()
    {
        return $this->IdUser;
    }

    /**
     * Set the value of IdUser
     */
    public function setIdUser($IdUser): self
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
     * Get the value of Tente
     */
    public function getTente(): array
    {
        return $this->Tente;
    }

    /**
     * Set the value of Tente
     */
    public function setTente(array $Tente): self
    {
        $this->Tente = $Tente;

        return $this;
    }

    /**
     * Get the value of Van
     */
    public function getVan(): array
    {
        return $this->Van;
    }

    /**
     * Set the value of Van
     */
    public function setVan(array $Van): self
    {
        $this->Van = $Van;

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
