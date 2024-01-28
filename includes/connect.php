<?php

    $conn=mysqli_connect('localhost', 'root', '', 'mystore');

    if(!$conn)
    {
        die(mysqli_connect_error());
    }

?>