<?php 
    ob_start(); // Output Buffering has been turned ON. For more info about output buffer visit: https://www.php.net/manual/en/function.ob-start.php
<<<<<<< HEAD
=======

    session_start(); // Start user's session and starts $_SESSION super global. For more info on session_start() visit: https://www.php.net/manual/en/function.session-start.php
>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08
    
    /*  
    The following CONSTANTS define the file paths to specific folders in the server (in the hard-drive). 
    For more info on php constants visit: https://www.w3schools.com/php/php_constants.asp
    */

    // Get directory name of this file = initialize.php
    define("PRIVATE_PATH", dirname(__FILE__));
    // Get dirname of PRIVATE_PATH / parent folder or ROOT of our project
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    // Set the path to the 'Public' directory
    define("PUBLIC_PATH", PROJECT_PATH . "/public");
    // Set the path to the 'Shared' directory
    define("SHARED_PATH", PRIVATE_PATH . "/_shared");

    /* 
        WWW_ROOT is a constant that points to any file or folder's url within our project.
        It is helpful for relative links that are shared in multiple pages.
        
        Usage example:
        <link rel="stylesheet" type="text/css" href="<?php echo url_for('_styles/main.css') ?>" >

        $_SERVER is an array containing information such as headers, paths, and script locations. The entries in this array are created by the web server.
        For more info on $_SERVER array visit: https://www.php.net/manual/en/reserved.variables.server.php
    */  
    $public_end = strpos($_SERVER["SCRIPT_NAME"], "/public") + 7;
    $doc_root = substr($_SERVER["SCRIPT_NAME"], 0, $public_end);
    define("WWW_ROOT", $doc_root);


    // Load our php functions library
    require_once("functions.php");
    
    // Load our database functions library
    require_once("database_functions.php");

    // Load our query functions library
    require_once("query_functions.php");

    // Load our validations functions library
    require_once("validation_functions.php");

    // Connect to the databse
    $db = db_connect();

    // List of errors for all pages
    $errors = [];

?>