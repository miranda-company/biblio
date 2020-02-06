<?php
    /*  In this file we'll store all the functions related to the databse. */
    require_once("db_credentials.php");

    // DB connect
    function db_connect(){
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        return $connection;
    }

    // DB disconnect
    function db_disconnect($connection){
        if(issset($connection)){
            mysqli_close($connection);
        }
    }

?>