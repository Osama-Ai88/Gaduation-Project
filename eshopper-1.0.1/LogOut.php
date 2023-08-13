<?php 
include 'DBconn.php';


include 'FinalRatting.php';

$a = $connection;


include 'UpdateFinalRatting.php';

session_unset();
session_destroy();
session_write_close();

    header('location:signin.php');

?>