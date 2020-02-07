<?php
    /*  In this file we'll store all the functions related to the databse. */
    require_once("db_credentials.php");

    // DB connect
    function db_connect(){
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
        confirm_db_connect();
        return $connection;
    }

    // DB disconnect
    function db_disconnect($connection){
        if(issset($connection)){
            mysqli_close($connection);
        }
    }

    // Confirm DB connection
    function confirm_db_connect(){
        if( mysqli_connect_errno() ){
            $msg = "Database connection failed: "; 
            $msg .= mysqli_connect_error();
            $msg .= " (" . mysqli_connect_errno() . ")";
            exit($msg);
        }
    }

    // Confirm if Query succeeded
    function confirm_query($result){
        if(!$result){
            exit("Database query failed.");
        }
    }

?>