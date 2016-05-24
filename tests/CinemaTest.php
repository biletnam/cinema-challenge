<?php

namespace Sven\Tests\Cinema;

use Sven\Cinema\Cinema;

class CinemaTest extends TestCase
{
    /** @test */
    public function it_returns_the_number_for_an_empty_seat()
    {
        $seatNumbers = $this->cinema(100)->seat(1);

        $this->assertEquals([1], $seatNumbers);
    }

    /** @test */
    public function it_can_seat_multiple_people()
    {
        $seatNumbers = $this->cinema(100)->seat(6);

        $this->assertEquals([1, 2, 3, 4, 5, 6], $seatNumbers);
    }

    /** @test */
    public function it_returns_null_if_it_cant_seat_everyone()
    {
        $seatNumbers = $this->cinema(20)->seat(21);

        $this->assertEquals(null, $seatNumbers);
    }

    /** @test */
    public function it_finds_a_seat_if_there_are_already_people_in_the_cinema()
    {
        $taken = [1, 2, 3, 4, 5];
        $seatNumbers = $this->cinema(100, $taken)->seat(3);

        $this->assertEquals([6, 7, 8], $seatNumbers);
    }

    /** @test */
    public function it_splits_people_up()
    {
        $taken = [1, 2, 3, 6, 7, 8];
        $seatNumbers = $this->cinema(10, $taken)->seat(4);

        $this->assertEquals([4, 5, 9, 10], $seatNumbers);
    }

    /** @test */
    public function it_splits_people_in_multiple_groups()
    {
        $taken = [1, 2, 3, 6, 8, 9, 13, 14];
        $seatNumbers = $this->cinema(20, $taken)->seat(8);

        $this->assertEquals([4, 5, 7, 10, 11, 12, 15, 16], $seatNumbers);
    }

    /** @test */
    public function it_prefers_the_whole_group_together()
    {
        $taken = [1, 2, 6, 7, 8, 14];
        $seatNumbers = $this->cinema(15, $taken)->seat(4);

        $this->assertEquals([9, 10, 11, 12], $seatNumbers);
    }
}
