<!DOCTYPE html>
<html>

    <head>
        <title> 🗺️ Hello World 🌍 </title>
    </head>

    <body>
        <h1> Test Pour PHP </h1>
        <p>
            <?php
               $servername = 'db'; 
               $username = 'serviceMan';
               $password = 'pwd';
               $dbname = 'camagru_db';

               $connection = new mysqli($servername, $username, $password, $dbname)

               if($connection->connect_error) {
                die(' 😔 Connection Failed: 🤷‍♂️ ', $connection->connect_error);
               }
               echo ' ♻️ Connected Successfully ! 🫵🏼';
            ?>
        </p>
    </body>

</html>