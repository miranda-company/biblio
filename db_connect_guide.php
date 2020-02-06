<?php 

    /* 
        This guide demonstrates the five fundamental aspects of database interaction using PHP and msqli.
    */

    //Credentials
    $db_host = "localhost";
    $db_user = "admin";
    $db_password = "rmochosiete1";
    $db_name = "biblio";

    // 1. Create a database connection
    $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    // 2. Perform database query
    $query = "SELECT * FROM books";
    $result_set = mysqli_query($connection, $query);

    // 3. Use returned data (if any)
    while($book = mysqli_fetch_assoc($result_set)){
        echo $book["id"];
    }

    // 4. Relase returned data
    mysqli_free_result($result_set);
    
    // 5. Close dabase connection
    msqli_close($connection);

?>