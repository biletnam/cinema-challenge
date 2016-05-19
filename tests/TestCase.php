<?php

namespace Sven\Tests\Cinema;

use Sven\Cinema\Cinema;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_the_number_for_an_empty_seat()
    {
        $cinema = new Cinema(100);
        $seatNumbers = $cinema->seat(1);

        $this->assertEquals([1], $seatNumbers);
    }
}
