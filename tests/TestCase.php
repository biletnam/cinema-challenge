<?php

namespace Sven\Tests\Cinema;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    public function cinema($capacity, $taken = [])
    {
        return new \Sven\Cinema\Cinema($capacity, $taken);
    }
}
