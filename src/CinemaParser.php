<?php

namespace Sven\Cinema;

class CinemaParser
{
    /**
     * @var array
     */
    protected $map;

    /**
     * @param array $map
     */
    public function __construct(array $map)
    {
        $this->map = $map;
    }

    /**
     * Parse the cinema's rows.
     *
     * @return array
     */
    public function rows()
    {
        return array_map(function($row) {
            return array_count_values($row)[0] ?? 0;
        }, $this->map);
    }

    public function seats()
    {
        // [
        //  0 => [1, 2, 3, 4, 5],
        //  1 => [1, 2, 5],
        //  2 => [1, 4],
        //  3 => [],
        // ]
        return array_map(function($row) {
            var_dump($row);
        }, $this->map);
    }
}
