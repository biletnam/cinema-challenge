<?php

namespace Sven\Cinema;

class Cinema
{
    /**
     * @var integer
     */
    protected $capacity;

    /**
     * @var array
     */
    protected $takenSeats;

    /**
     * Instantiate the Cinema class.
     *
     * @param integer $capacity The amount of people the cinema can seat.
     * @param array $takenSeats The numbers of the seats that are already taken.
     */
    public function __construct(int $capacity, array $takenSeats = [])
    {
        $this->capacity = $capacity;
        $this->takenSeats = $takenSeats;
    }

    /**
     * Seat the given amount of people.
     *
     * @param integer $amount The amount of people to try and seat.
     *
     * @return mixed Array of seat numbers for the given order or null.
     */
    public function seat(int $amount = 1)
    {
        if (!$this->canSeat($amount)) {
            return null;
        }

        $places = $this->availableSeats();
        $offset = $this->findGap($amount, $places);

        return array_slice($places, $offset, $amount);
    }

    /**
     * Determine whether or not the cinema can seat the given amount of people.
     *
     * @param integer $amount The amount of people to try and seat.
     *
     * @return bool
     */
    protected function canSeat(int $amount)
    {
        return ($this->capacity - count($this->takenSeats) >= $amount);
    }

    /**
     * Get all the available seats in the cinema.
     *
     * @return array Seat numbers of the available seats.
     */
    protected function availableSeats()
    {
        $output = [];

        for ($seat = 1; $seat <= $this->capacity; $seat++) {
            in_array($seat, $this->takenSeats) ? null : array_push($output, $seat);
        }

        return $output;
    }

    /**
     * Find a gap to fit a given amount of people in.
     *
     * @param integer $amount Amount of people to fit.
     * @param array $available Seat numbers of available seats.
     *
     * @return integer The offset in the array of available seats.
     */
    protected function findGap(int $amount, array $available)
    {
        $output = [];

        foreach ($available as $key => $seat) {
            if (isset($available[$key + 1]) && $seat + 1 == $available[$key + 1]) {
                $output[] = $key;

                continue;
            }

            if (count($output) == $amount) {
                break;
            }

            $output = [];
        }

        return isset($output[0]) ? $output[0] : 0;
    }
}
