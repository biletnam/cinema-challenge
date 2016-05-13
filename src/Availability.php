<?php

namespace Sven\Cinema;

class Availability
{
    /**
     * @var \Cinema\CinemaParser
     */
    private $parser;

    /**
     * Instantiate the Availability class.
     *
     * @param array $map A map of the current availability
     */
    public function __construct(array $map)
    {
        $this->parser = new CinemaParser($map);
    }

    /**
     * Return the rows where seats are still available
     *
     * @return array
     */
    public function rows()
    {
        // [
        //  0 => 5,
        //  2 => 3,
        //  3 => 2,
        //  4 => 0,
        // ]
        $rowMap = $this->parser->rows();

        foreach ($rowMap as $rowNumber => $spaces) {
            echo sprintf('There are %s spaces available on row %s.<br>', $spaces, $rowNumber + 1);
        }
    }

    public function seats()
    {
        $seatMap = $this->parser->seats();
        // [
        //  0 => [1, 2, 3, 4, 5],
        //  1 => [1, 2, 5],
        //  2 => [1, 4],
        //  3 => [],
        // ]
    }
}
