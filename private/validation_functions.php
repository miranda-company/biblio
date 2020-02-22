<?php

<<<<<<< HEAD
    /* This file contains all our functions for validating data */
=======
    /* 
        This file contains all our functions for validating data.
        We want to validate the data (coming from user's input) before we create or update records in the database. 
        That's the right place to enforce these rules. So the form data comes in from the user, we run our validations, and then we either create or update the records. 
    */
>>>>>>> 797343f3dbf27e749318809d9cc70b12f56bef08

    /*
        Check if value is blank

        > is_blank("abcd)
        > Validate data presence.
        > Uses trim() so empty spaces don't count
        > uses === to avoid false positives
    */
    function is_blank($value){
        return !isset($value) || trim($value) === "";
    }

    /*
        Check if value has presence / check if it's not empty

        > has_presence("abcd)
        > Validate data presence.
        > Reverse of is_blank()
    */
    function has_presence($value){
        return !is_blank($value);
    }

    /*
        Check if value has lenght greater than specific value

        > has _lenght_greater_than("abc", 5)
        > spaces count towards length
        > use trim() if spaces should not count
        > uses php strlen();
    */
    function has_length_greater_than($value, $min){
        $length = strlen($value);
        return $length > $min;
    }

    /*
        Check if value has lenght less than specific value

        > has has_length_less_than("abc", 5)
        > spaces count towards length
        > use trim() if spaces should not count
        > uses php strlen();
    */
    function has_length_less_than($value, $max){
        $length = strlen($value);
        return $length < $max;
    }


    /*
        Check if value has the same length as specific value

        > has has_length_exactly("abc", 5)
        > spaces count towards length
        > use trim() if spaces should not count
        > uses php strlen();
    */
    function has_length_exactly($value, $exact){
        $length = strlen($value);
        return $length == $exact;
    }

    /*
        Check if value is inside a set of values

        > has has_inclusion_of(5, [0,1,2,3,4,5])
        > uses php in_array();
    */
    function has_inclusion_of($value, $set){
        return in_array($value, $set);
    }


    /*
        Check if value is not inside a set of values

        > has has_exclusion_of(5, [0,1,2,3,4,6])
        > uses php in_array();
    */
    function has_exclusion_of($value, $set){
        return !in_array($value, $set);
    }


    /*
        Check if a value is within a string

        > has_string("nobody@nowhere", ".com" )
        > validate inclusion of character(s)
        > strpos returns string start position or false
        > uses !== to prevent position 0 from being considered false
        > uses php strpos();
    */
    function has_string($value, $required_string){
        return strpos($value, $required_string) !== false;
    }


    /*
        Check if email has a valid email format

        > has_valid_email_format("nobody@nowhere.com")
        > format: [chars]@[chars].[2+ letters]
        > uses preg_match() > for more info visit: https://www.php.net/manual/en/function.preg-match.php
    */
    function has_valid_email_format($value){
        $email_regex = "/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i"; //< this is a regualar expression. For more info on regex visit: https://www.regular-expressions.info/
        return strpos($value, $required_string) !== false;
    }

?>