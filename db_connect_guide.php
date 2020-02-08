<?php 

    /* 
        This guide demonstrates the five fundamental aspects of database interaction using PHP and msqli.
        CRUD = Create, Read, Update, Delete
        For more info on data manipulation statements in mysql visit: https://dev.mysql.com/doc/refman/8.0/en/sql-data-manipulation-statements.html
    */

    // Credentials
    $db_host = "localhost";
    $db_user = "admin";
    $db_password = "rmochosiete1";
    $db_name = "biblio";
    $db_port = NULL; // depending on your configuration you might need to add the port for the connection

    // 1. Create a database connection
    $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name, $db_port);

    // Check if connection succeeded with mysqlli_connect_errno (error number) and mysqli_connect_error()
    if( mysqli_connect_errno() ){
        $msg = "Database connection failed: "; 
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }

    // 2. Perform database query
    $query = "SELECT * FROM books";
    $result_set = mysqli_query($connection, $query);

    // 3. Use returned data (if any)
    /*  mysqli_fetch_assoc automatically advances the pointer to the next row in the result set 
        For more info on mysqli_fetch_assoc visit: https://www.php.net/manual/es/mysqli-result.fetch-assoc.php 
    */
    while($book = mysqli_fetch_assoc($result_set)){
        echo $book["id"];
    }

    // Check if query succeeded
    if(!$result_set){
        exit("Database query failed.");
    }

    // 4. Relase returned data
    mysqli_free_result($result_set);
    
    // 5. Close dabase connection
    msqli_close($connection);

?>