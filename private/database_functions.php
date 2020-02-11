<?php
    /* To connect to the database using php we will use an API called mysqli. For more info visit: https://www.php.net/manual/en/mysqli.overview.php
        The five steps to connect to a db using php are:
        1. Create a database connection
        2. Perform a database query
        3. Use returned data (if any)
        4. Release returned data
        5. Close the database connection

        The msqli function we'll use to connect is the following: 
        msqli_connect($host, $user, $password, $database);

        The mysqli function we'll use to close the connection is:
        mysqli_close($connection);

    */
    
    /*  In this file we'll store all the functions related to the databse. */
    require_once("db_credentials.php");

    // DB connect
    function db_connect(){
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        confirm_db_connect();
        return $connection;
    }

    // DB disconnect
    function db_disconnect($connection){
        if(isset($connection)){
            mysqli_close($connection);
        }
    }

     // Sanitize data for SQL - escape dynamic sql values
     function db_escape($connection, $string){
        return mysqli_real_escape_string($connection, $string);
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