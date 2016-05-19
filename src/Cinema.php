<?php

namespace Sven\Cinema;

class Cinema
{
    /**
     * @var int
     */
    protected $capacity;

    /**
     * @var array
     */
    protected $takenSeats;

    /**
     * Instantiate the Cinema class.
     *
     * @param int|integer $capacity The amount of people the cinema can seat.
     * @param array $takenSeats The numbers of the seats that are already taken.
     */
    public function __construct(int $capacity, array $takenSeats = [])
    {
        sort($takenSeats);

        $this->capacity = $capacity;
        $this->takenSeats = $takenSeats;
    }

    /**
     * Instantiate the Cinema object.
     *
     * @param  int|integer $people The amount of people to try and seat.
     *
     * @return array The seat numbers for the given order.
     */
    public function seat(int $people = 1)
    {
        if (!$this->canSeat($people)) {
            return null;
        }

        //
    }

    protected function canSeat(int $amount)
    {
        return ($this->capacity - count($this->takenSeats) <= $amount);
    }

    protected function findPlaces(int $amount)
    {

    }
}
