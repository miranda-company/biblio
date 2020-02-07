<?php

    // Find all books in db
    function find_all_books(){
        global $db;
        $sql = "SELECT * FROM books ";
        $sql .= "ORDER BY id ASC";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        return $result;
    }

    // Find book from books
    function find_book_by_id($id){
        global $db;
        $sql = "SELECT * FROM books ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        $book = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $book; // returns an assoc. array
    }

    // Create new book
    function create_new_book($book_title, $author_name, $genre, $description, $rating, $lent, $borrower){
        global $db;
        $sql = "INSERT INTO books ";
        $sql .= "(title, author_id, genre_id, description, rating, borrowed, borrower) ";
        $sql .= "VALUES (";
        $sql .= "'" . $book_title . "',";
        $sql .= "'" . $author_name . "',";
        $sql .= "'" . $genre . "',";
        $sql .= "'" . $description . "',";
        $sql .= "'" . $rating . "',";
        $sql .= "'" . $lent . "',";
        $sql .= "'" . $borrower . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        
        // For INSERT statements, $result is true / false
        if($result){
            return true;
        }else{
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    // Update book
    function update_book($book){
        global $db;
        $sql = "UPDATE books SET ";
        $sql .= "title='" . $book[title] . "', ";
        $sql .= "author_id='" . $book[author_id] . "', ";
        $sql .= "genre_id='" . $book[genre_id] . "', ";
        $sql .= "rating='" . $book[rating] . "', ";
        $sql .= "description='" . $book[description] . "', ";
        $sql .= "borrowed='" . $book[borrowed] . "', ";
        $sql .= "borrower='" . $book[borrower] . "' ";
        $sql .= "WHERE id='" .  $book[id] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);
        
        // For UPDATE statements, $result is true / false
        if($result){
            return true;
        }else {
            // Update failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }
    
?>