<?php  
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connection = mysqli_connect("localhost:3306", "root", "", "fidelity_stores");

if(!$connection)
{
    echo "The connection has failed.";
    exit();
}
?>