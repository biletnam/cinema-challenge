<?php

require 'vendor/autoload.php';

use Sven\Cinema\Cinema;

$takenSeats = [3, 4, 5, 6, 8, 10, 13, 14, 15, 18, 19, 23, 24, 25, 29, 30, 32];
$cinema = new Cinema(32, $takenSeats);

if (isset($_POST['seats']) && !empty($_POST['seats'])) {
    $seats = $cinema->seat($_POST['seats']);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bioscoop Challenge</title>
        <meta charset="UTF-8">
        <style>
            .container { width: 400px; margin: 0 auto; }
            .seats, form { display: flex; flex-wrap: wrap; justify-content: center; align-content: center; margin: 10px 0; }
            .seat { padding: 10px; margin: 5px; font-size: 18px; }
            .seat.available { background-color: green; }
            .seat.taken { background-color: red; }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="seats">
                <?php foreach ($cinema->all() as $seat => $available): ?>
                    <div class="seat<?= $available ? ' available' : ' taken' ?>"><?= $seat ?></div>
                <?php endforeach ?>
            </div>

            <form action="" method="POST">
                <input type="number"
                       name="seats"
                       placeholder="Reserveer stoelen..."
                       max="<?= array_count_values($cinema->all())[1] ?>"
                >
                <input type="submit" value="Submit">
                <?php if(isset($seats) && !empty($seats)): ?>
                    <p>Succesvol gereserveerd voor stoelnummer(s):</p>
                    <ul>
                        <?php foreach ($seats as $seat): ?>
                            <li><?= $seat ?></li>
                        <?php endforeach ?>
                    </ul>
                <?php endif ?>
            </form>
        </div>
    </body>
</html>
