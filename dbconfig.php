<?php
$hostname = "localhost";
$username = "root";
$dbpass = "";
$dbname = 'seven';

$conn = mysqli_connect($hostname, $username, $dbpass, $dbname);
?>

<div class="container mt-5">
    <?php
    if (!$conn)
        // echo "<h1>the db successfully contected</h1>";
        echo "</h1>something went wrong</h1>";
    
   
    ?>
</div>