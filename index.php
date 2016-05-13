<?php

require __DIR__.'/vendor/autoload.php';

use Sven\Cinema\Availability;

// This would come from the DB / an API...
$availabilityMap = [
    [0, 0, 0, 0, 0],
    [0, 0, 1, 1, 0],
    [0, 1, 1, 0, 1],
    [1, 1, 1, 1, 1],
];

$availability = new Availability($availabilityMap);

$availability->rows();
$availability->seats();
