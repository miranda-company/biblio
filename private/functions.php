<?php 

    //Function that returns the path to a file inside the PUBLIC directory of our website:
    function url_for($script_path){
        if($script_path[0] != "/"){
            $script_path = "/" . $script_path;
        }
        return WWW_ROOT . $script_path;
    }

    /* 
        Shortened urlencode: urlencode is convenient when encoding a string to be used in a query part of a URL, as a convenient way to pass variables to the next page.
        For more info on urlencode visit: https://www.php.net/manual/en/function.urlencode.php
    */
    function u($string=""){
        return urlencode($string);
    }

    /*
        Shortened rawurlencode: rawurlencode is convenient when encoding a string to be used in a query part of a URL, as a convenient way to pass variables to the next page.
        For more info on rawurlencode visit: https://www.php.net/manual/en/function.rawurlencode.php 
    */
    function raw_u($string=""){
        return rawurlencode($string);
    }

    /*
        Encode for html, convert special characters to HTML entities. You should use this encode for every data that comes dynamically from a database and you want to render it into the website. 
        For more info on htmlspecialchars visit: https://www.php.net/manual/en/function.htmlspecialchars.php 
    */
    function h($string=""){
        return htmlspecialchars($string);
    }


    /*
        HTTP Headers and modifying them with php headers function. 
        This is usefull to create page-redirects. They can be applied also for redirecting user to specific language: https://stackoverflow.com/questions/17803702/auto-detect-language-and-redirect-user
        For more info on modifying headers with php visit: https://www.php.net/manual/en/function.header.php
    */
    function error_404(){
        header($_SERVER["SERVER_PROTOCOL"] . "404 Not found");
        exit();
    }

    function error_500(){
        header($_SERVER["SERVER_PROTOCOL"] . "500 Internal server error");
        exit();
    }

    function redirect_to($location){
        header("Location: " . $location);
        exit;
    }
    
    // Post and Get request methods. Which request method was used to access the page; e.g. 'GET', 'POST'. This functions tell us if the form was submitted or not.
    function is_post_request(){
        return $_SERVER["REQUEST_METHOD"] == "POST";
    };

    function is_get_request(){
        return $_SERVER["REQUEST_METHOD"] == "GET";
    };
?>