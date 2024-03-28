<?php

namespace src\Models;

use src\Services\Hydratation;

class Event
{

    private $Id_Date;
    private $Date_Start;
    private $Date_End;
    private $Price;
    private $Reduce_Price;
    private $Name;

    use Hydratation;


    /**
     * Get the value of Id_Date
     */
    public function getIdDate()
    {
        return $this->Id_Date;
    }

    /**
     * Set the value of Id_Date
     */
    public function setIdDate($Id_Date): self
    {
        $this->Id_Date = $Id_Date;

        return $this;
    }

    /**
     * Get the value of Date_Start
     */
    public function getDateStart()
    {
        return $this->Date_Start;
    }

    /**
     * Set the value of Date_Start
     */
    public function setDateStart($Date_Start): self
    {
        $this->Date_Start = $Date_Start;

        return $this;
    }

    /**
     * Get the value of Date_End
     */
    public function getDateEnd()
    {
        return $this->Date_End;
    }

    /**
     * Set the value of Date_End
     */
    public function setDateEnd($Date_End): self
    {
        $this->Date_End = $Date_End;

        return $this;
    }

    /**
     * Get the value of Price
     */
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * Set the value of Price
     */
    public function setPrice($Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    /**
     * Get the value of Reduce_Price
     */
    public function getReducePrice()
    {
        return $this->Reduce_Price;
    }

    /**
     * Set the value of Reduce_Price
     */
    public function setReducePrice($Reduce_Price): self
    {
        $this->Reduce_Price = $Reduce_Price;

        return $this;
    }

    /**
     * Get the value of Name
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set the value of Name
     */
    public function setName($Name): self
    {
        $this->Name = $Name;

        return $this;
    }
}
