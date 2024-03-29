<?php

namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class FormResa
{
    private DateTime $date;
    private Event $Event;

    use Hydratation;

    /**
     * Get the value of date
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate(DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of Event
     */
    public function getEvent(): Event
    {
        return $this->Event;
    }

    /**
     * Set the value of Event
     */
    public function setEvent(Event $Event): self
    {
        $this->Event = $Event;

        return $this;
    }
}
