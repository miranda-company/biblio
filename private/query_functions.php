<?php

    // BOOKS queries:

    // Find all books in db
    function find_all_books(){
        global $db;
        $sql = "SELECT * FROM books ";
        $sql .= "ORDER BY id ASC";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        return $result;
    }

    // Find a book from books table
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

    // Validate user's book input
    function validate_book_input($book){
        $errors = [];

        //Check book title
        if( is_blank($book["title"]) ){
            $errors["error_title"] = "You're missing the title of the book.";
        }

        //Check book description
        if( is_blank($book["description"]) ){
            $errors["error_description"] = "The description can't be left blank.";
        }

        return $errors;
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

        //Validate book input
        $errors = validate_book_input($book);
        if( !empty($errors) ){
            return $errors;
        }

        $sql = "UPDATE books SET ";
        $sql .= "title='" . $book[title] . "', ";
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

    // Delete book
    function delete_book($id){
        global $db;
        $sql = "DELETE FROM books ";
        $sql .= "WHERE id='" . $id . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);

        // For DELETE statements, $result is true/false
        if($result){
            return true;
        }else {
            // Delete failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        } 
    }

    // AUTHORS queries:

    // Find all authors in db
    function find_all_authors(){
        global $db;
        $sql = "SELECT * FROM authors ";
        $sql .= "ORDER BY name ASC";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        return $result;
    }

    // Find an author from authors table
    function find_author_by_id($id){
        global $db;
        $sql = "SELECT * FROM authors ";
        $sql .= "WHERE id='" . $id . "'";
        $result = mysqli_query($db, $sql);
        confirm_query($result);
        $author = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $author; // returns an assoc. array
    }

    // Create new author

    // Update author
    function update_author($author){
        global $db;
        $sql = "UPDATE authors SET ";
        $sql .= "name='" . $author[name] . "', ";
        $sql .= "surname='" . $author[surname] . "' ";
        $sql .= "WHERE id='" .  $author[id] . "' ";
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