<?php
    function find_all_books(){
        global $db;
        $sql = "SELECT * FROM books ";
        $sql .= "ORDER BY id DESC";
        $result = mysqli_query($db, $sql);
        return $result;
    }
    
?>